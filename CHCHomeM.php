<?php
///Provides service to create TP category log.
/**
 * @files
 * @startcomment
 *  File: < CHCHomeM.php>
 *
 *
 *  Current Owner: <Saransh Agrawal> (09-FEB-2014)
 *
 *
 *  Purpose:
 *  1.  Create tp category log.
 *  2.  
 *  3.  
 *
 *  Dependencies:
 *      Refer to the File inclusion for File Dependencies
 *
 *
 *  Classes: CHCHomeM
 *
 *  Global functions:None.
 *
 *
 *  Notes:
 *   No design notes .
 *  AND/OR
 *  No framework required.
 *  AND/OR
 *  NO constants. 
 *
 *  Test Page : None.
 *
 * @endcomment
 *  @todo    task1
 *
 */

class CHCHomeM
{  
    //======== member variables =========

    private $vDbConn;                           ///< database connection
    private $vRow;
    private $vDebugTraceFlag;                   ///< debug trace flag
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
        // Register the Destructor to be called
        // This is needed in case of Abnormal termination of script caused by FATAL error
        // in which case, the object destructor is not called
        register_shutdown_function(array(&$this, "__destruct"));

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

        // return call status as VOID
        return;
    }

    /// to initialize varibales/acquire resources/contruct & initialize objects required by the class
    /**
     * @startcomment
     * Purpose: to initialize varibales/acquire resources/contruct & initialize objects required by the class
     *
     * Input Params:
     *  1.  $pDbConn - resource - database connection
     *  2.  $pDebugTraceFlag - boolean - to switch on/off debugging
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
    public function Initialize($pDbConn = 0, $pDebugTraceFlag = 0, $pCHCHomeStruct=null)
    {
        
        // debug trace on function entry
        if( $pDebugTraceFlag == 1 ) tlibphp_debug_trace_func ( __METHOD__."<BR>\n" );

        $this->vDebugTraceFlag          = $pDebugTraceFlag;
        $this->vDbConn                  = $pDbConn;
		$this->vResult					= '';
        $this->vRow                     = '';
		$this->vCHCHomeStructObj		= $pCHCHomeStruct;	

        // return call status as success
        return 1;
    }
    /// Load TP category log date.
    /**
     * @startcomment
     * Purpose:Fetch TP category log date.
     *
     * Input Params:
     *  
     *
     * Output Params:None
     *
     * Return Value:
     *  item id,item cost - if item found  
     *  0 - item not found
     *
     * Notes:
     * @endcomment
	 * Pending : 
     */
    public function HCHomeData()
    {
		$sql="SELECT  
				HID.INSTITUTE_NAME INSTITUTE_NAME,
				HID.RANKING RANKING,
				HIAD.ADDRESS_LINE1 ADDRESS_LINE1,
				HIAD.ADDRESS_LINE2 ADDRESS_LINE2,
				HIAD.PIN_CODE,
				HCM.CITY_NAME
				FROM 
				TEST.INSTITUTE_DTL HID
				LEFT JOIN TEST.INSTITUTE_ADDRESS_DTL HIAD
				ON HIAD.INSTITUTE_DTL__ID = HID.ID
				LEFT JOIN TEST.CITY_MST HCM
				ON HCM.ID=HIAD.CITY_MST__ID
			";
		$this->vResult = mysqli_query($this->vDbConn,$sql);

		while($this->vRow = mysqli_fetch_assoc($this->vResult)){
			$this->vCHCHomeStructObj->vInstituteList[]	=	$this->vRow;		
		}
		
		

        return ;
    }
}

?>
