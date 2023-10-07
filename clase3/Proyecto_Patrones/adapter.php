<?php

/**
* interface for creating render classes
*/
interface RenderTemplateInterface
{
   public function renderHeader();
   public function renderBody();
   public function renderFooter();
}

/**
* Used for rendering HTML templates
*/
class RenderHTMLTemplate implements RenderTemplateInterface
{
   public function renderHeader()
   { return "<html><body style='color:white; background-color:black; padding:20px;'>";}

   public function renderBody()
   { return "Hello World";} 

   public function renderFooter()
   { return "</body></html>";}
}

/**
* Separate interface just for rendering PDF's
* Having a separate interface from RenderTemplateInterface could be a requirement from a third party
*/
interface PDFTemplateInterface
{
   public function renderTop();
   public function renderMiddle();
   public function renderBottom();
}

/**
* Used for rendering PDF templates
*/
class RenderPDFTemplate implements PDFTemplateInterface
{
   public function renderTop()
   {return "This is the top of the PDF"; }
   public function renderMiddle()
   { return "Hello World"; }
   public function renderBottom()
   {return "This is the bottom of the PDF"; }
}

/**
* The adapter - this will encapsulate an instance of the RenderPDFTemplate class
* to work polymorphically with the RenderTemplateInterface interface
*/
class PDFTemplateAdapter implements RenderTemplateInterface
{
   private $pdfTemplate;
   public function __construct(PDFTemplateInterface $pdfTemplate)
   { $this->pdfTemplate = $pdfTemplate; }
   public function renderHeader()
   { return $this->pdfTemplate->renderTop();}
   public function renderBody()
   { return $this->pdfTemplate->renderMiddle(); }
   public function renderFooter()
   { return $this->pdfTemplate->renderBottom();}
}

$pdfTemplate = new RenderPDFTemplate();
// $pdfTemplateAdapter will implement RenderTemplateInterface, just like RenderHTMLTemplate does
$pdfTemplateAdapter = new PDFTemplateAdapter($pdfTemplate); 
// This is the top of the PDF
echo $pdfTemplateAdapter->renderHeader();