@extends('layouts.app')

@section('content')
<?php
require_once('../vendor/autoload.php');

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

 $spreadsheet = new Spreadsheet();
 $sheet = $spreadsheet->getActiveSheet();
 $row = 2;
 foreach ($machtigingItems as $machtigingItem) {
   $sheet->setCellValue('A'.$row , $machtigingItem->iban);
   $sheet->setCellValue('B'.$row , $machtigingItem->id);
   $sheet->setCellValue('C'.$row , $machtigingItem->created_at);
   $sheet->setCellValue('D'.$row , '9.99');
   $sheet->setCellValue('E'.$row , $machtigingItem->fullname);
   $sheet->setCellValue('F'.$row , $machtigingItem->membership_plan);
   $row++;
 }
  $sheet->setCellValue('A1','IBAN')
        ->setCellValue('B1','Mandaat-ID')
        ->setCellValue('C1','Mandaat-Datum')
        ->setCellValue('D1','Bedrag')
        ->setCellValue('E1','Naam')
        ->setCellValue('F1','Beschrijving')
        ;

 $writer = new Xlsx($spreadsheet);
 $writer->save('../storage/file/test1.xlsx');

?>

<a href={{ asset('download/test1.xlsx') }}>Excel</a>
@endsection
