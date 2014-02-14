<?php 
    
/// Construct view for HC Home
/**
 * @file
 * @startcomment
 *  File: CHCHomeWI.php
 *
 *
 *  Current Owner: Saransh Agrawal(09-FEB-2014)
 *
 *
 *  Purpose:
 *  <basic purpose of the file and services as a numbered list preferably with input and output>
 *  1.  service 1 gives what given what
 *  2.  service 1 gives what given what
 *  ...
 *  n.  service n gives what given what
 *
 *
 *  Dependencies:
 *  <Files which provide services to this file.>
 *  1.  <file1/object1>
 *  2.  <file2/object2>
 *  ...
 *  n.  <filen/objectn> ...
 *
 *
 *  Classes:
 *  <Classes that are defined in the current file.>
 *  1. CCustomerInvoiceWI
 *  
 *  Global functions:
 *  1. <function1> optional desc or parameter info
 *  2. <function2> optional desc or parameter info
 *  ...
 *  n.  <functionn> optional desc or parameter info
 *
 *
 *  Notes:
 *  View fil for customer invoice module
 *  AND/OR
 *  <framework, reading which, it will be easy for the reader to understand the source>
 *  AND/OR
 *  <constants if used also should mention the value or where they are defined>
 *
 *
 *  Test Page : <Name of the page used to test current file.>
 *
 * @endcomment
 *
 *  <To Do section to say what is pending. Nothing in this section implies
 *  the code is complete, all functionalities have been coded, tested
 *  and cleared. Even if something is to be tested or something dependent
 *  on somebody else is pending, should be mentioned here>
 *
 *  <typically anything to be done, but not in this release must
 *  also be mentioned in this section with sub section>
 *  @todo    task1
 *  @todo    task2
 *  ...
 *  @todo    taskn
 *
 */

// all local constants are defined here

// all file inclusions are here



/// Brief class description.
/**
 *
 * @class
 * @startcomment
 *  Purpose : Render view for TP category log
 *
 *  Object functions
 *      1.  ...
 *      2.  ...
 *      n.  ...
 * 
 *  Notes:
 *      1.  ...
 *         1.  ...
 *         2.  ...
 *      2.  ...
 * @endcomment
 */
class CHCHomeWI
{

    //======== member variables =========

    private $vHtmlCode;                            ///< constructed html code
    private $vDebugTraceFlag;                      ///< debug trace flag
    private $vExceptionObj;                        ///< exception details
    private $vWindowTitle;                         ///<Window title
    private $vExternalCssNJss;                     ///<External jss n css files
    private $vLocalCssCode;                        ///<Local css code 
    private $vDbConn;                              ///<Database connection
    private $vPageTitle;                           ///<Page Title
    private $vData;
    private $vUserRightsArr;
	private $vEmpFlag;
	private $vCHCHomeStructObj;
    //======== public functions =========

    /// to construct object of the class
    /**
     * @startcomment
     * Purpose: to construct object of the class
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    public function __construct()
    {
        return;
    }

    /// to unset/release/destroy varibales/resources/objects used by the class
    /**
     * @startcomment
     * Purpose: to unset/release/destroy varibales/resources/objects used by the class
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    public function __destruct() 
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        // destroy objects
        //unset( $this->vCustomerInvoiceStruct );
        //unset( $this->vCustomerInvoiceModelObj );

        return;
    }

    /// to initialize varibales/acquire resources/contruct & initialize objects required by the class
    /**
     * @startcomment
     * Purpose: to initialize varibales/acquire resources/contruct & initialize objects required by the class
     *
     * Input Params:
     *  1.  $pDebugTraceFlag - boolean - to switch on/off debugging
     *
     * Output Params:   none
     *
     * Return Value:
     *  1 - boolean - Success
     *  0 - boolean - Failure
     *
     * Notes:
     * @endcomment
     */

    public function Initialize( $pDebugTraceFlag=0,$pDbConn=0, $pCHCHomeStruct=null)
    {
        // debug
        if( $pDebugTraceFlag == 1 ) tlibphp_debug_trace_func( __CLASS__." :: ".__FUNCTION__ );

        //Initialize member variables
        $this->vDebugTraceFlag      =   $pDebugTraceFlag;
        $this->vExceptionObj        =   "";
        $vWindowTitle               =   "";
        $this->vHtmlCode            =   "";
        $this->vDbConn              =   $pDbConn;
        $this->vPageTitle           =   "TP Limits";  
		$this->vCHCHomeStructObj	=	$pCHCHomeStruct;
       // $this->vUserID              =   $pUserID;



        //$this->vData                =   "";

        //success
        return 1;
    }
    /// to set user data
    /**
     * @startcomment
     * Purpose: to set user data
     *
     * Input Params:
     *  1.  $pUserID - integer - user id of logged on user
     *  2.  $pUserRightsArr - array - rights of the logged on user
     *  3.  $pUserPreferencesArr - array - preferences of the logged on user
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    public function SetUserData()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

    
        return;
    }
    public function SetEventData( $pEventID)
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );
        
        $this->vEventID = $pEventID;
    }


     /// to render html 
    /**
     * @startcomment
     * Purpose: to render html
     *
     * Input Params:
     *  1.  $pDebugTraceFlag - boolean - to switch on/off debugging
     *
     * Output Params:   none
     *
     * Return Value:
     *  1 - boolean - Success
     *  0 - boolean - Failure
     *
     * Notes:
     * @endcomment
     */

    public function RenderView()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        // case: if error passed by controller
        if ( isset($this->vExceptionObj) && is_object($this->vExceptionObj) )
        {
            $this->vRenderExceptionInfo();
			return ;
        }

        

        try 
        {
            $this->vStartPage();
            $this->vConstructHCHome();
            
            if(!$this->vHtmlCode ) 
            {
				//throw exception
                //throw new CCommonException ( $this->vDbConn, _ID_HRMS_TRAVELEXPENSE_EMPTY_HTML , "Empty HTML" );
            } 
            else print ( $this->vHtmlCode );
        }
        catch (CCommonException $e)
        {
			$this->SetExceptionDetails($e);

            $this->vRenderExceptionInfo();
        }

        $this->vEndPage();
        
        return;

    }

    /// Set the Error info based on the Exception thrown.
    /**
     * @startcomment
     * Purpose: Set the Error info based on the Exception thrown.
     *
     * Input Params:
     *  1.  $pExceptionObj	- Obj	- Exception object
     *
     * Output Params:
     *
     * Return Value:
     *
     * Notes:
     * @endcomment
     */

    public function SetExceptionDetails ( $pExceptionObj )
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        $this->vExceptionObj = $pExceptionObj;
    }


 

    //======== private functions =========


    /// to clear error information
    /**
     * @startcomment
     * Purpose: to clear error information
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    private function vClearExceptionInfo()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        unset($this->vExceptionObj);

        // return call status as VOID
        return;
    }

    /// to render error information
    /**
     * @startcomment
     * Purpose: to render error information
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    private function vRenderExceptionInfo()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        $exceptionArr = $this->vExceptionObj->GetExceptionDetails();

		//print "<pre>";
		//print_r($exceptionArr);
		//print "</pre>";

        // switch n error level
        switch( $exceptionArr['STATUS_TYPE'] )
        {
        // case: warning
        case _ID_ERROR_LEVEL_WARNING :
            print tlibphp_display_error_message_html ( "Warning", $exceptionArr, $pWidth = "", $pLinkArr = array(), $pOther = "" );
            $this->vClearExceptionInfo();
            break;

        // case: non fatal error
        case _ID_ERROR_LEVEL_ERROR :
            print tlibphp_display_error_message_html ( "Error", $exceptionArr, $pWidth = "", $pLinkArr = array(), $pOther = "" );
            $this->vClearExceptionInfo();
            break;

        // case: fatal error
        case _ID_ERROR_LEVEL_FATAL_ERROR :
            $this->vStartPage();
            print tlibphp_display_error_message_html ( "Fatal Error", $exceptionArr, $pWidth = "", $pLinkArr = array(), $pOther = "" );
            $this->vEndPage();
            exit();
            break;
        }

        // return call status as VOID
        return;
    }


    /// start page rendering
    /**
     * @startcomment
     * Purpose: start page rendering
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    private function vStartPage()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        print ( "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/html1/DTD/html1-transitional.dtd\">");

        // start html page
        print ( "<HTML>\n" );
    
        // start head tag
        print ( "<HEAD>\n" );

		$this->vWindowTitle = "TP Limits";
    
        // render the title
        print ( "<TITLE>". $this->vWindowTitle ."</TITLE>\n" );

        // render JS on page head section
        $this->vRenderStartPageCSSAndJS();
    
        // end head tag
        print ( "</HEAD>\n");
    
        // start body with onload event handler, if specified        
        print ("<BODY>");

        

        $this->vCheckForVisibility();


        return;
    }
         /// to check whether the user can view the page
    /**
     * @startcomment
     * Purpose:  to check whether the user can view the page
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    private function vCheckForVisibility ()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) GDebugTraceFunc ( __METHOD__."<BR>\n" );

        return;
    }


    /// to render local javascript at the start of page
    /**
     * @startcomment
     * Purpose: to render local javascript at the start of page
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    private function vRenderStartPageCSSAndJS()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );


        

        
/*		print ( "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"lib/bootstrap/css/bootstrap.min.css\">");
*		print ( "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"CHCHomeCSS.css\">");
*		print ( "\n<script type=\"text/javascript\" src=\"lib/js/jquery-1.6.2.min.js\"></script>");
*		print ( "\n<script type=\"text/javascript\" src=\"lib/js/jquery-ui-slider.min.js\"></script>");
*       print ( "\n<script type=\"text/javascript\" src=\"lib/js/slider.js\"></script>");
*		print ( "\n<script type=\"text/javascript\" src=\"lib/data.js\"></script>");
*		
*       print ( "\n<SCRIPT TYPE=\"text/javascript\" SRC=\"CHCHomeJS.js \"></SCRIPT>\n" );
*/
		
		print ( "\n<link rel='stylesheet' type='text/css' href='CHCHomeCSS.css'>");		
		print ( "\n<link rel='stylesheet' href='jquery-ui-1.10.4.custom/css/custom-theme/jquery-ui-1.10.4.custom.css'>" );
		print ( "\n<script src='jquery-ui-1.10.4.custom/js/jquery-1.10.2.js'></script>" );
		print ( "\n<script src='jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js'></script>" );
		print ( "\n<SCRIPT TYPE='text/javascript' SRC='CHCHomeJS.js'></SCRIPT>" );
		
		

        
        // include page-level/local js files 
        $this->vIncludeLocalJSFiles();
        // include page-level/local css 
        $this->vRenderLocalCSS(); 

        return;
    }

    /// brief description of function.
    /**
     * @startcomment
     * Purpose:
     *
     * Input Params:
     *  1.  Param1 - DataType - Desc
     *  2.  Param1 - DataType - Desc
     *
     * Output Params:
     *  1.  Param1 - DataType - Desc
     *  2.  Param1 - DataType - Desc
     *
     * Return Value:
     *  ReturnVal - DataType - Desc
     *
     * Notes:
     * @endcomment
     */
    private function vRenderLocalCSS( )
    {
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );


        $this->vLocalCssCode.="<style type='text/css'>";
        
        $this->vLocalCssCode.="table{border-collapse:collapse;}";
        $this->vLocalCssCode.=".string{text-align:left;padding-left:5px;}";
        $this->vLocalCssCode.=".number{text-align:right;padding-right:5px;}";
        $this->vLocalCssCode.=".date{text-align:center;padding-left:3px;padding-right:3px;}";
        $this->vLocalCssCode.="</style>";

        echo $this->vLocalCssCode;

        return;
    }
    /// to include page-level/local js files 
    /**
     * @startcomment
     * Purpose: to include page-level/local js files 
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    private function vIncludeLocalJSFiles()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        // include page-level/local js files 
        echo <<<JS
            <script>
            </script>
JS;
        return;
    }

	/// to construct tp category limit view.
	/**
	 * @startcomment
	 * Purpose: to construct tp category log.
	 *
	 * Input Params: none
	 *
	 * Output Params: none
	 *
	 * Return Value:
	 *  0 - Int - Failure
	 *  1 - Int - Success
	 *
	 * Notes:
	 * @endcomment
	 */
    private function vConstructHCHome()
    {
         // debug trace on function entry
         if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );
    
        $this->vHtmlCode.="<div id='Container'>";
		/*$this->vHtmlCode.="<div id='CategoryBarDiv' class='ui-widget-header'>";
		$this->vHtmlCode.="<div class='Category'>Music</div>"; 
		$this->vHtmlCode.="<div class='Category'>Language</div>";
		$this->vHtmlCode.="<div class='Category'>Fitness</div>";
		$this->vHtmlCode.="</div>";*/
		 
		 
		$this->vHtmlCode.="<div id='CategoryTabDiv'>";
		$this->vHtmlCode.="<ul>";
		$this->vHtmlCode.="<li><a href='#tabs-1' id='MusicTab'>MUSIC</a></li>";
		$this->vHtmlCode.="<li><a href='#tabs-1'>LANGUAGE</a></li>";
		$this->vHtmlCode.="<li><a href='#tabs-1'>FITNESS</a></li>";
		$this->vHtmlCode.="<li><a href='#tabs-1'>ART</a></li>";
		$this->vHtmlCode.="<li><a href='#tabs-1'>OTHERS</a></li>";
		$this->vHtmlCode.="</ul>";
		$this->vHtmlCode.="<div id='tabs-1'>";		
		$this->vHtmlCode.="</div>";
		
		
		$this->vHtmlCode.="</div>";

		 //echo sizeof($this->vCHCHomeStructObj->vInstituteList);
         //echo $this->vCHCHomeStructObj->vInstituteList[0]['INSTITUTE_NAME'];
    
         $this->vRenderData();
		 

         $this->vHtmlCode.="</div>";
         
         return;

    }

    private function vRenderData()
    {
        
        $this->vHtmlCode.="<div id='resultContainer'>";			
		$this->vHtmlCode.="</div>";
		$this->vRenderHiddenData();
        return;
        
    }
	
	private function vRenderHiddenData(){
	
	
			
	}



     /// end page rendering
    /**
     * @startcomment
     * Purpose: end page rendering
     *
     * Input Params:    none
     *
     * Output Params:   none
     *
     * Return Value:    none
     *
     * Notes:
     * @endcomment
     */
    private function vEndPage()
    {

        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

      
     
        print("</body>\n");
        print("</html>\n");
        return;

    }
    
}//End of class 

            
?>
