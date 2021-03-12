<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use PHPExcel_IOFactory;
use PHPExcel;
use App\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;



class ImportController extends Controller
{

    public function importExcel(Request $request){

        $request = $request->file;

        $name = $request->getClientOriginalName();

        $objPHPExcel = PHPExcel_IOFactory::load('/home/long/Downloads/'.$name);

        $objWorksheet = $objPHPExcel->getActiveSheet();

        $new = [];

        $combie = [];

        $newArray = [];

        foreach ($objWorksheet->getRowIterator() as $row) {

            $cellIterator = $row->getCellIterator();

            $cellIterator->setIterateOnlyExistingCells(false);

            $data = [];

            foreach ($cellIterator as  $cell) {

                $data[] = $cell->getValue();

                $filter = array_filter($data); // bo nhung phan tu khong co gia tri trong mang


            }

            array_push($new,$filter);

        }

        array_shift($new); // xoa phan tu dau tien cua mang

        foreach ($new as $value){

            $key = $keys = array(

                'id', 'name', 'email', 'email_verified_at','password','address','phone','remember_token','created_at','updated_at'

            );

            $combie = array_combine($keys, $value); // tron mang

            array_shift($combie);

            array_push($newArray,$combie);


        }

        $this->insertExcel($newArray);

        return redirect()->back();


    }

    public function insertExcel($data){


        foreach ($data as $value){

            if (User::where('email', '=', $value['email'])->exists()) {

                return back()->with([Session::flash('message', 'Email is exist')]);
            }

            $users = new User();
            $users->name =  $value['name'];
            $users->email = $value['email'];
            $users->phone = $value['phone'];
            $users->address = $value['address'];
            $users->password = bcrypt('12345678');
            $users->save();

        }

    }

    public function Export(){

        $fileName = 'userExport.xlsx';
        $users = User::all();
        $objPHPExcel = new Spreadsheet();
        $i = 2;


        $objPHPExcel->createSheet();

        $activeSheet = $objPHPExcel->setActiveSheetIndex(0);

        $activeSheet->setCellValue('A1', 'id')
                        ->setCellValue('B1', 'name')
                        ->setCellValue('C1', 'email')
                        ->setCellValue('D1', 'email_verified_at')
                        ->setCellValue('E1', 'password')
                        ->setCellValue('F1', 'address')
                        ->setCellValue('G1', 'remember_token')
                        ->setCellValue('H1', 'created_at')
                        ->setCellValue('I1', 'updated_at');

        foreach ($users as  $item){

            $activeSheet->setCellValue("A$i",$item->id);
            $activeSheet->setCellValue("B$i",$item->name);
            $activeSheet->setCellValue("C$i",$item->email);
            $activeSheet->setCellValue("D$i",$item->email_verified_at);
            $activeSheet->setCellValue("E$i",$item->password);
            $activeSheet->setCellValue("F$i",$item->address);
            $activeSheet->setCellValue("G$i",$item->remember_token);
            $activeSheet->setCellValue("H$i",$item->created_at);
            $activeSheet->setCellValue("I$i",$item->updated_at);

            $i++;


        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, "Xlsx");
        $writer->save('/home/long/Downloads/'.$fileName);
        return redirect()->route('home');
      }


}
