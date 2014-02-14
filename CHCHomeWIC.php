<?php
/// Controller file for the HC Home.
/**
 * @file
 * @startcomment
 *  File: CHCHomeWIC.php
 *
 *
 *  Current Owner: Saransh Agrawal (09-FEB-2014)
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
 *  1. <CHCHomeWIC>
 *  2. <Class_name>
 *
 *  Global functions:
 *  1. <function1> optional desc or parameter info
 *  2. <function2> optional desc or parameter info
 *  ...
 *  n.  <functionn> optional desc or parameter info
 *
 *
 *  Notes:
 *  <design notes which are in the *mind* of the author and need to be
 *  known to the person reading the source and trying to understand it>
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

//switch case constants
define("_ID_HC_HOME_INVOKE_DEFAULT"     , "1");



// all file inclusions are here
require_once ( "CHCHomeWI.php");
require_once ( "CHCHomeM.php");
require_once ( "CHCHomeStruct.php");

/// Brief class description.

/**
 *
 * @class
 * @startcomment
 *  Purpose :
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

class CHCHomeWIC
{

    //======== member variables =========
    private $vDbConn;                                       // < database connection
    private $vCHCHomeMObj;                      				// < instance of the model
    private $vCHCHomeWIObj;			                        // < instance of the view
	private $vCHCHomeStructObj;		                        // < instance of the data structure
    private $vDebugTraceFlag;                               // < debug trace flag
    private $vDestructObj;                                  // < for use in destructor
	private $vEventID;										// < Event ID
    


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
        // Register the Destructor to be called
        // This is needed in case of Abnormal termination of script caused by FATAL error
        // in which case, the object destructor is not called
        register_shutdown_function(array(&$this, "__destruct"));

        return ;
    }


    // to unset/release/destroy varibales/resources/objects used by the class
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
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func( __METHOD__."<BR>\n" );

        
        if($this->vDestructObj!=1){
        
			// destroy objects
			unset( $this->vCHCHomeMObj  		);
			unset( $this->vCHCHomeWIObj   	);
			unset( $this->vCHCHomeStructObj  );
	
			// release database connection        
			if($this->vDbConn){
				mysqli_close($this->vDbConn);
			}
	
			$this->vDestructObj=1;
        }
		
        // return call status as VOID
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
    public function Initialize( $pDebugTraceFlag = 0 )
    {
        // debug trace on function entry
        if( $pDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        // initialize member variables
        $this->vDebugTraceFlag          = $pDebugTraceFlag;          
		$this->vDbConn                  = mysqli_connect("127.0.0.1","test","","test");        
        $this->vEventID                 = 0;
        $this->vDestructObj             = 0;


    

        //check wheter database connection is valid or not		
		if (mysqli_connect_errno())  {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}		     
		
		
        //Instantiation & initialization of model,view and data structure
		$this->vCHCHomeStructObj 	= new CHCHomeStruct();
        $this->vCHCHomeMObj			= new CHCHomeM();
        $this->vCHCHomeMObj->Initialize( $this->vDbConn, $this->vDebugTraceFlag,$this->vCHCHomeStructObj );
        $this->vCHCHomeWIObj 		= new CHCHomeWI();
        $this->vCHCHomeWIObj->Initialize( $this->vDebugTraceFlag,$this->vDbConn,$this->vCHCHomeStructObj); 
		

        //return call status*/
        return 1;
    }

    /// primary function of the controller
    /**
     * @startcomment
     * Purpose: primary function of the controller
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
    public function Main()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );
		
        // collect request vars
        $this->vGetRequestVars();        
        // handle events
        $this->vHandleEvents();

        // return call status as VOID
        return;

    }

    //============================== private functions ==============================

    /// to collect request vars
    /**
     * @startcomment
     * Purpose: to collect all variables come with http request like get, post variables
     *
     * Input Params:    none
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
    private function vGetRequestVars()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        // set request vars to class vars
        $this->vEventID         = _ID_HC_HOME_INVOKE_DEFAULT;//tlibphp_if_empty ( $_POST["strEventId"], _ID_MIS_CRM_MTP_REPORT_INVOKE_DEFAULT);

        // return call status as success
        return 1;
    }
    
    /// to handle all application events by calling appropriate event handler
    /**
     * @startcomment
     * Purpose: to handle all application events by calling appropriate event handler
     *
     * Input Params:     none
     * 
     * Output Params:    none
     * 
     * Return Value:
     *  1 - boolean - Success
     *  0 - boolean - Failure
     *
     * Notes:
     * @endcomment
     */
    private function vHandleEvents()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );
 
            //select right event handler 
            switch ($this->vEventID){
            
            case _ID_HC_HOME_INVOKE_DEFAULT :
                               
                return $this->vCHCHomeDefaultEventHandler();

            default:                

                return ;
            }//end of switch statement
        
        // return call status as VOID
        return ;

    }

    /// Event handler to fetch data for tp category log 
    /**
     * @startcomment
     * Purpose:to fetch data for tp category log
     *   
     *
     * Input Params:
     *  
     *
     * Output Params:None
     *
     * Return Value:
     *  1 - success  
     *  0 - Failure
     *
     * Notes:
     * @endcomment
	 * Pending : 
     */
    private function vCHCHomeDefaultEventHandler()
    {
        // debug trace on function entry
        if( $this->vDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

            $this->vCHCHomeMObj->HCHomeData();            
            return $this->vCHCHomeWIObj->RenderView();

    }


}//End of class   


    // main section

    // instantiate Controller object
    $controllerObj = new CHCHomeWIC();
    
    try 
    {
        //initialize the controller object
        $controllerObj->Initialize(0);
    
        // execute Controller object
        $controllerObj->Main();
    
    } 
    catch (CCommonException $e) 
    {
        $viewObj = new CHCHomeWI();
        $viewObj->Initialize(0);
        $viewObj->SetExceptionDetails($e);
        $viewObj->RenderView(0);
        echo "<h1>Something wrong:</h1><br/>$e";
        exit(0);
    }

?>

