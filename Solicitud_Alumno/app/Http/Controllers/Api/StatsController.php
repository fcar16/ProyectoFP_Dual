<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index()
    {
        $groups = ['1-ASIR', '2-ASIR', '1-DAW', '2-DAW', '1-DAM', '2-DAM'];
        $studentsPerGroup = [];
        foreach ($groups as $group) {
            $studentsPerGroup[] = Student::where('group', $group)->count();
        }
        $withCV = Student::whereNotNull('CV')->where('CV', '!=', '')->count();
        $withoutCV = Student::whereNull('CV')->orWhere('CV', '')->count();

        // Empresa más solicitada usando la tabla pivote company_student
        $mostRequested = DB::table('company_student')
            ->select('company_id', DB::raw('count(*) as total'))
            ->groupBy('company_id')
            ->orderByDesc('total')
            ->first();

        $companyName = null;
        $companyRequests = 0;
        if ($mostRequested) {
            $company = Company::find($mostRequested->company_id);
            $companyName = $company ? $company->name : null;
            $companyRequests = $mostRequested->total;
        }

        $totalStudents = Student::count();
        $totalCompanies = Company::count();
        $totalRequests = DB::table('company_student')->count();

        return response()->json([
            'groups' => $groups,
            'studentsPerGroup' => $studentsPerGroup,
            'withCV' => $withCV,
            'withoutCV' => $withoutCV,
            'mostRequestedCompany' => $companyName,
            'mostRequestedCompanyCount' => $companyRequests,
            'totalCompanies' => $totalCompanies,
            'totalRequests' => $totalRequests,
        ]);
    }
}