<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 10:16
 */

interface Export
{
    public function doExport();
}

class PDF implements Export
{
    public function doExport()
    {
        return 'Exporting to PDF...';
    }
}

class Json implements Export
{

    public function doExport()
    {
        return 'Exporting to Json...';
    }
}

class Xml implements Export
{

    public function doExport()
    {
        return 'Exporting to XML...';
    }
}

class Doc implements Export
{

    public function doExport()
    {
        return 'Exporting to Doc...';
    }
}

class Client
{
    private $exporter;

    public function __construct(Export $exporter)
    {
        $this->exporter = $exporter;
    }

    // Quando se quer definir o tipo do retorno, é colocado : tipo;
    public function doExport() : string
    {
        return $this->exporter->doExport();
    }
}

$exporter = new Xml();
$export = new Client($exporter);
print $export->doExport();