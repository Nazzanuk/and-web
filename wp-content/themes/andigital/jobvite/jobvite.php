<?php
require_once('jobvite-jobs.php');

/**
 * Obtains an XML-based feed of company jobs from Jobvite.
 *
 */
class Jobvite { 
  /**
   * Map a company jobs's xml fields
   */
  private static $xmlJobFieldsMap = array(
    'id', 'title','requisitionid', 'category', 'jobtype' => 'jobType', 'location',
    'date', 'details-url' => 'detailsUrl', 'apply-url' => 'applyUrl', 'description',
    'briefdescription' => 'briefDescription'
  );   
  
  protected $jobs = array();
  protected $companyId;
  
  /**
   * Contructor
   *
   * @param string $companyId The ID of the company at Jobvite
   */
  public function __construct($companyId) {
    if (!$companyId) {
      throw new Jobvite_Exception("You must pass a company ID");
         echo "You must pass a company ID";
    }
    
    $this->companyId = $companyId;
  }

  public function loadSourceFile($companyId) {
  		$path = get_template_directory() . '/../../uploads/jobvite/';
	    if (!file_exists($path)) {
	    	mkdir($path);
	    }
  		$fp = fopen($path . "/.lock", "w");
	    if (flock($fp, LOCK_EX)) {
	  		$filename = $path . $companyId . '.xml';
	  		$xml = null;
	  		if (file_exists($filename)) {
			    $xml = file_get_contents($filename);
	  		}
		    if (!$xml || time() - filemtime($filename) > 60) {
			    $xml = file_get_contents('http://www.jobvite.com/CompanyJobs/Xml.aspx?c=' . $companyId);
			    file_put_contents($filename, $xml, LOCK_EX);
		    }
		    flock($fp, LOCK_UN);
		    return $xml;
	    } else {
		    $xml = file_get_contents('http://www.jobvite.com/CompanyJobs/Xml.aspx?c=' . $companyId);
	    }
  }
  
  /**
   * Fetches the XML from Jobvite and parses it in to a number
   * of Jobvite_Job objects.
   *
   * @return void
   */
  public function build() {
    $xml = $this->loadSourceFile($this->companyId);
    if (!$xml) {
      throw new JobviteException("could not load the xml from jobvite");
    }
      
    $dom = simplexml_load_string($xml);
    if (!$dom) {
      throw new JobviteException("could not parse xml from jobvite");
    }
      
    foreach ($dom->job as $jobs) {
      $dataFields = array();
      foreach(self::$xmlJobFieldsMap as $xmlField => $objectField) {
          $dataFields[$objectField] = (string) $jobs->{!is_numeric($xmlField) ? $xmlField : $objectField};
      }
      $this->jobs[] = new Jobvite_Job($dataFields);
    }
  }
  
  /**
   * Fetch the jobs found in the feed.
   *
   * You can also filter jobs by passing an array as the first argument.
   * The format is filterField => filterValue. If the filterField on a given
   * job is blank, it is assumed to have 'passed' the filter.
   *
   * @param string $filters 
   * @return array
   */
  public function jobs($filters = null) {
    if (is_array($filters)) {
      $filteredJobs = array();
      foreach ($this->jobs as $job) {
        $pass = true;
        foreach($filters as $filterField => $filterValue) {
          if ($job->$filterField && $job->$filterField != $filterValue) {
            $pass = false;
            break;
          }
        }
        if ($pass) {
          $filteredJobs[] = $job;
        }
      }
      return $filteredJobs;
    }
    return $this->jobs;
  }
  
  /**
   * Fetch an array of fields and the count of jobs they contain.
   *
   * By default, it will return a map of categoryName => no. jobs 
   *
   * @return array
   */
  public function categoryListBy($field = 'category') {
    $categories = array();
    foreach ($this->jobs() as $job) {
      $categories[$job->$field] = isset($categories[$job->$field]) ? $categories[$job->$field] + 1 : 1;
    }
    return $categories;
  }
  
  public function returnJobByrequisitionid($reqid) {
    foreach ($this->jobs() as $job) {
      if ($job->requisitionid == $reqid) {
        return $job;
      }
    }
  }
  
  public function returnJobByTitle($title) {
    foreach ($this->jobs() as $job) {
      if ($job->title == $title) {
        return $job;
      }
    }
  }

}

class Jobvite_Exception extends Exception {}

?>