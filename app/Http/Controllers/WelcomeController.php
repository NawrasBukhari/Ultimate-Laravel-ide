<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function idePost(Request $request)
    {
        $language = strtolower($request->get('language'));
        $code = $request->get('code');

        $validator = Validator::make($request->all(),
            [
            'language' => 'required|filled',
                'code' => 'required|filled'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors()->first(),
                'success' => 'false',
            ], 400);
        } else {

            try {
                $random = substr(md5(mt_rand()), 0, 32);
                $filePath = storage_path('app/temp/' . $random . '.' . $language);

                $programFile = fopen($filePath, "w");
                fwrite($programFile, $code);
                fclose($programFile);

                if ($language == "php") {
                    return shell_exec("C:\compilers\php\php.exe $filePath 2>&1");
                } elseif ($language == "python") {
                    return shell_exec("C:\compilers\python\python.exe $filePath 2>&1");
                } elseif ($language == "node") {
                    rename($filePath, $filePath . ".js");
                    return shell_exec("C:\compilers\jsnode\jsnode.exe $filePath.js 2>&1");
                } elseif ($language == "c") {
                    $outputExe = '../compiled_exe/' . $random . ".exe";
                    shell_exec("C:\compilers\C\bin\gcc.exe $filePath -o $outputExe");
                    return shell_exec(base_path('compiled_exe') . '/' . "//$outputExe");
                } elseif ($language == "cpp") {
                    $outputExe = '../compiled_exe/' . $random . ".exe";
                    shell_exec("C:\compilers\C\bin\g++.exe $filePath -o $outputExe");
                    return shell_exec(base_path('compiled_exe') . '/' . "//$outputExe");
                }
                return $validator->errors()->first();
            } catch (Exception $e) {
                echo $e;
            }
        }
        return $validator->errors()->first();
    }
}
