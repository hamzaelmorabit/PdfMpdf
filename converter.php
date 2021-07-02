<?php
$obj = new stdClass;
$obj->name = "Deepak";
$obj->age = 21;
$obj->marks = 75;
function handlHour($hour_)
{

  $hourPM = (object) array(
    '12' => '00',
    '13' => '01',
    '14' => '02',
    '15' => '03',
    '16' => '04',
    '17' => '05',
    '18' => '06',
    '19' => '07',
    '20' => '08',
    '21' => '09',
    '22' => '10',
    '23' => '11'

  );
  if (isset($hourPM->{$hour_}))
    return $hourPM->{$hour_};
  return $hour_;
}

// print_r(handlHour("16"));
function handleDate($date)
{
  $dateArray = explode("-", $date);
  return $dateArray[2] . '/' . $dateArray[1] . '/' . $dateArray[0];
}

function handleDateWithTime($date)
{


  $dateArray = explode("-", $date);
  $day = substr($dateArray[2], 0, 2);
  $time = substr($dateArray[2], 2, 6);
  $changToPm = handlHour(substr($time, 1, 2));

  if ($changToPm != substr($time, 1, 2))
    $addPmAM = 'PM';
  else
    $addPmAM = 'AM';

  // return ($changToPm);
  return $day . '/' . $dateArray[1] . '/' . $dateArray[0] . ' '
    . $changToPm . '' . substr($time, 3, 4) . ' ' . $addPmAM;
}

// echo handleDateWithTime("2021-03-17 16:39:31");
$string = file_get_contents("./formatA.json");
$json = json_decode($string, true);
$someObject  = json_decode(json_encode($json), true);


function getMultiple($tableMeasurement)
{
  $arryaMaximum_depth = '[';
  $arryaVolume = '[';
  $arryArea = '[';
  for ($i = 0; $i < sizeof($tableMeasurement); $i++) {
    // if ($tableMeasurement[$i]["maximum_depth"] == "multiple") {
    if (isset($tableMeasurement[$i]["maximum_depth"]))
      $arryaMaximum_depth .=  $tableMeasurement[$i]["maximum_depth"] . ',';
    if (isset($tableMeasurement[$i]["maximum_depth"]))
      $arryaVolume .= $tableMeasurement[$i]["volume"] . ',';
    if (isset($tableMeasurement[$i]["area"]))
      $arryArea .= $tableMeasurement[$i]["area"] . ',';

    // }
  }
  $arryaMaximum_depth = substr($arryaMaximum_depth, 0, strlen($arryaMaximum_depth) - 1);
  $arryaVolume = substr($arryaVolume, 0, strlen($arryaVolume) - 1);
  $arryArea = substr($arryArea, 0, strlen($arryArea) - 1);

  $arryaMaximum_depth .= ']';
  $arryaVolume .= ']';
  $arryArea .= ']';
  $arryaMeasure  = array(
    'maximum_depth' =>
    $arryaMaximum_depth,
    'volume' =>
    $arryaVolume,
    'area' =>
    $arryArea,

  );
  return
    $arryaMeasure;
  // for ($i = 0; $i < sizeof($tableMeasurement); $i++) {
  //   if ($tableMeasurement[$i]["structure"] == "multiple") {
  //     return $tableMeasurement[$i];
  //   }
  // }
  // return "false";
}
$multipleWound = getMultiple($someObject["wounds"][0]["measurements"]);
echo ($multipleWound["maximum_depth"]);



function handleItemCLINICAL($itemClinical)
{

  if (substr_count($itemClinical, "_") == 2) {
    $value = $itemClinical[0] . '' . $itemClinical[strpos($itemClinical, "_") + 1] . ' ' . $itemClinical[strrpos($itemClinical, "_") + 1];
  } else {
    $value = $itemClinical[0] . '' . $itemClinical[1] . ' ' . $itemClinical[strpos($itemClinical, "_") + 1];
  }
  return  $value;
}
// echo handleItemCLINICAL("POSTERIOR_TIBIAL_LEFT");

function getAssementsValue($assessment_value)
{
  $WOUND_EDGE
    = '';
  $PERI_WOUND_SKIN = '';
  $PAIN = '';
  $DRAINAGE = '';
  $ODOR = '';
  $INFECTED = '';
  $CLINICAL = '';
  $CLINICAL = '';
  $TUNNELING = '';
  $UNDERMINING = '';
  $NOTES = '';

  for ($i = 0; $i < sizeof($assessment_value); $i++) {

    switch ($assessment_value[$i]["sub_group"]) {
      case 'WOUND_EDGE':
        $WOUND_EDGE .= ucfirst(strtolower($assessment_value[$i]["item"])) . ', ';
        break;

      case 'PERI_WOUND_SKIN':
        $PERI_WOUND_SKIN .= ucfirst(strtolower($assessment_value[$i]["item"])) . ', ';
        break;

      case 'PAIN':
        if ($assessment_value[$i]["item"] == "SCALE")
          $PAIN .= (($assessment_value[$i]["value"])) . ' - ' . ucfirst(str_replace("_", "-", strtolower($assessment_value[$i - 1]["item"])));
        break;

      case 'DRAINAGE':
        if ($assessment_value[$i]["item"] == "AMOUNT")
          $DRAINAGE .= ucfirst(strtolower(($assessment_value[$i]["value"]))) . ' : ' . ucfirst(strtolower($assessment_value[$i + 1]["item"]));
        break;

      case 'ODOR':
        $ODOR .= ucfirst(strtolower($assessment_value[$i]["item"]));
        break;

      case 'INFECTION':
        $INFECTED .= (($assessment_value[$i]["value"]));
        break;

      case 'CLINICAL':
        $item_ = handleItemCLINICAL($assessment_value[$i]["item"]);
        $CLINICAL .= $item_ . ':' . $assessment_value[$i]["value"] . ', ';
        break;


      case 'TUNNELING_UNDERMINING':
        if ($assessment_value[$i]["item"] == "TUNNELING_LENGTH")
          $TUNNELING .=  'Direction ' . $assessment_value[$i + 1]["value"] . ' - ' . $assessment_value[$i]["value"] . ' cm';
        if ($assessment_value[$i]["item"] == "UNDERMINING_LENGTH")
          $UNDERMINING .=  'Direction ' . $assessment_value[$i + 1]["value"] . ' - ' . $assessment_value[$i]["value"] . ' cm';

        break;

      case 'NOTES':
        // $date = handleDateWithTime($date);
        // $NOTES .=  $generator_role .' ' . $date.':\n'.$assessment_value[$i]["value"] ;
        $NOTES .= $assessment_value[$i]["value"];

        break;

      default:
        # code...
        break;
    }
  }
  return  [
    $WOUND_EDGE,
    $PERI_WOUND_SKIN,
    $PAIN,
    $DRAINAGE,
    $ODOR,
    $INFECTED,
    $CLINICAL,
    $TUNNELING,
    $UNDERMINING, $NOTES
  ];
}
$WOUND_EDGE = getAssementsValue($someObject["wounds"][0]["assessments"][0]["assessment_value"]);
echo ($WOUND_EDGE[0]);



function convertFormatA()
{

  $string = file_get_contents("./formatA.json");
  $json = json_decode($string, true);

  $someObject  = json_decode(json_encode($json), true);

  if ($someObject["wounds"][0]["facility_acquired"] == null) $facility_acquired = "No";
  else $facility_acquired = "Yes";

  $lastMeasurement = $someObject["wounds"][0]["measurements"][sizeof($someObject["wounds"][0]["measurements"]) - 1];
  $firstMeasurement = $someObject["wounds"][0]["measurements"][0];

  $multipleWound = getMultiple($someObject["wounds"][0]["measurements"]);

  //graph measurements
  $arryaMeasure  = getMultiple($someObject["wounds"][0]["measurements"]);


  $assessments = ($someObject["wounds"][0]["assessments"][0]);
  $assessments_ = getAssementsValue($someObject["wounds"][0]["assessments"][0]["assessment_value"]);
  $date = handleDateWithTime($assessments["created_at"]);
  $generator_role = ucfirst(str_replace("_", "-", strtolower($assessments["generator_role"])));
  $NoteAssessments = $generator_role . ' ' . $date  . ':<br/>' . $assessments_[9];


  $string = '
    [
  {
    "type": "header",
    "left_text": "' . $someObject["wounds"][0]["onset"] . '",
    "right_text": "",
    "columns": "2",
    "values": [
      {
        "type": "image",
        "key": "Acount",
        "value": "./images/ekareTitle.PNG"
      },
      {
        "type": "key_value",
        "key": "Patient Name",
        "value": "' . $someObject["last_name"] . ' ' . $someObject["first_name"] . '"
      },
      {
        "type": "key_value",
        "key": "MRN",
        "value":  "' . $someObject["mrn"] . '"
      },
      {
        "type": "key_value",
        "key": "Report Date:",
        "value": "' . date("d/m/Y h:ia") . '"
      }
    ]
  },
  
  {
    "type": "footer",
    "left_text": "",
    "right_text": "",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Acount",
        "value": "Hamza21"
      },
      {
        "type": "key_value",
        "key": "MRN",
        "value": "1"
      },
      {
        "type": "key_value",
        "key": "Site",
        "value": "Asm"
      },

      {
        "type": "key_value",
        "key": "City/Stat",
        "value": "Test"
      },

      {
        "type": "key_value",
        "key": "Generated by",
        "value": "Account, admin"
      }
    ]
  },
  {
    "type": "section",
    "left_text": "Patient Profile",
    "right_text": "",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Name",
        "value":"' . $someObject["last_name"] . ' ' . $someObject["first_name"] . '"
      },
      {
        "type": "key_value",
        "key": "MRN",
        "value": "1"
      },
      {
        "type": "key_value",
        "key": "DOB",
        "value":  "' . handleDate($someObject["dob"]) . '"
      },
      {
        "type": "key_value",
        "key": "Location",
        "value": ""
      },

      {
        "type": "key_value",
        "key": "Age/Sex",
        "value":  "0/' . $someObject["gender"] . '"
      },
     

      {
        "type": "key_value",
        "key": "Braden score",
        "value": ""
      },

      {
      
      }
    ]
  },

    {
    "type": "section",
    "left_text": "Wound",
    "right_text": "",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Etiology",
        "value":"' . $someObject["wounds"][0]["type"] . '"
      },
      {
        "type": "key_value",
        "key": "Onset Date",
        "value": "' . handleDate($someObject["wounds"][0]["onset"]) . '"
      },
      {
        "type": "key_value",
        "key": "Location",
        "value": ""
      },
      {
        "type": "key_value",
        "key": "Assessment Date",
        "value": "' . handleDateWithTime($assessments["created_at"]) . '"
      },

      {
        "type": "key_value",
        "key": "Status",
        "value":"' . $someObject["wounds"][0]["status"] . '"
      },
      {
        "type": "key_value",
        "key": "Clinician",
        "value": ""
      },
      {
        "type": "key_value",
        "key": "Facility acquired",
        "value": "' . $facility_acquired . '"
      }
    ]
  },

  
 {
    "type": "images",
    "left_text": "Images",
    "right_text": "' . handleDateWithTime($lastMeasurement["last_update_date"]) . '",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Initial",
        "value": "' . handleDateWithTime($someObject["wounds"][0]["measurements"][0]["last_update_date"]) . '"
      },
      {
        "type": "key_value",
        "key": "Current",
        "value":"' . handleDateWithTime($lastMeasurement["last_update_date"]) . '"
      },

      {
        "type": "image",
        "key": "",
        "value": "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
        
      },

      {
        "type": "image",
        "key": "",
        "value": "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
      },
        {
        "type": "key_value",
        "key": "L x W x D",
        "value": "' . $firstMeasurement["maximum_length"] . ' x ' . $firstMeasurement["maximum_width"] . ' x ' . $firstMeasurement["maximum_depth"] . ' cm³"
      },
      {},
      {
        "type": "key_value",
        "key": "Area",
        "value":"' . $firstMeasurement["area"] . ' cm²"
      },
      {},
      {
        "type": "key_value",
        "key": "Volume",
        "value": "' . $firstMeasurement["volume"] . ' cm³"
      },
      {},
      {
        "type": "key_value",
        "key": "Type",
        "value": "' . ucfirst($firstMeasurement["structure"]) . '"
      }
    
    ]
},

   {
    "type": "Assessments",
    "left_text": "Assessments",
    "right_text":"' . handleDateWithTime($assessments["created_at"]) . '",
    "columns": "1",
    "values": [
      {
        "type": "key_value",
        "key": "Wound edge",
        "value": "' . $assessments_[0] . '"
      },
      {},
      {
        "type": "key_value",
        "key": "Peri-wound",
        "value":"' . $assessments_[1] . '"
      },
      {},

      {
        "type": "key_value",
        "key": "Pain",
        "value": "' . $assessments_[2] . '"
      },
      {},

      {
        "type": "key_value",
        "key": "Drainage",
        "value":"' . $assessments_[3] . '"
      },
      {},
      {
        "type": "key_value",
        "key": "Odor",
        "value": "' . $assessments_[4] . '"
      },
      {},
      {
        "type": "key_value",
        "key": "Infection",
        "value": "' . $assessments_[5] . '"
      },
      {},
      {
        "type": "key_value",
        "key": "Clinical",
        "value": "' . $assessments_[6] . '"
      },
      {},
      {
        "type": "key_value",
        "key": "Tunneling",
        "value":"' . $assessments_[7] . '"
      },
      {},
      {
        "type": "key_value",
        "key": "Undermining",
        "value":"' . $assessments_[8] . '"
      },
      {},
      {
        "type": "key_value",
        "key": "Stage",
        "value": ""
      },
      {},
      {
        "type": "key_value",
        "key": "Non-removable",
        "value": ""
      },
      {},
      {
        "type": "key_value",
        "key": "device/dressing",
        "value": ""
      },
      {},
      {
        "type": "key_value",
        "key": "Push Score",
        "value": ""
      },
      {},
      {
        "type": "key_value",
        "key": "Notes",
        "value": "' . $NoteAssessments . '"
      }
    ]
  },

  
 {
    "type": "images",
    "left_text": "Images",
    "right_text": "17/03/2021 04:41 PM",
    "columns": "3",
    "values": [
      {
        "type": "image",
        "key": "22/12/2020",
        "value":  "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
      },

      {
        "type": "image",
        "key": "",
        "value":  "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
      },
      {
        "type": "image",
        "key": "22/12/2020",
        "value":  "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
      },

      {
        "type": "z",
        "key": "22/12/2020",
        "value": "7/03/2021 04:40 PM"
      },
      {
        "type": "z",
        "key": "22/12/2020",
        "value": "7/03/2021 04:42 PM"
      },
      {
        "type": "z",
        "key": "22/12/2020",
        "value": "7/03/2021 05:41 PM"
      },
      {
        "type": "image",
        "key": "22/12/2020",
        "value":  "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
      },

      {
        "type": "image",
        "key": "",
        "value":  "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
      },
      {
        "type": "image",
        "key": "22/12/2020",
        "value":  "https://cdn.mos.cms.futurecdn.net/DRctYzDgEFEaqGCmangmEX-1200-80.jpg"
      },

      {
        "type": "z",
        "key": "22/12/2020",
        "value": "7/03/2021 04:40 PM"
      },
      {
        "type": "z",
        "key": "22/12/2020",
        "value": "7/03/2021 04:42 PM"
      },
      {
        "type": "z",
        "key": "22/12/2020",
        "value": "7/03/2021 05:41 PM"
      }
    ]
  }
,
 {
    "type": "section",
    "left_text": "Patient Profile",
    "right_text": "",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Length",
        "value": "Image Test"
      },
      {
        "type": "key_value",
        "key": "Width",
        "value": "1"
      },
      {
        "type": "key_value",
        "key": "Avg Depth",
        "value": "17/03/2021"
      },
      {
        "type": "key_value",
        "key": "Max depth",
        "value": ""
      },

      {
        "type": "key_value",
        "key": "Area",
        "value": "0/M"
      },
      { "type": "key_value", 
        "key": "Volume", 
        "value": "" },
      {
        "type": "key_value",
        "key": "Red",
        "value": ""
      },

      {
        "type": "key_value",
        "key": "Yellow",
        "value": "Hamza"
      },

      {
        "type": "key_value",
        "key": "Black",
        "value": "Wound test"
      },
      {},
      {
        "type": "key_value",
        "key": "Type",
        "value": ""
      },
         {},
      {
        "type": "key_value",
        "key": "Status",
        "value": ""
      },
         {},
      {
        "type": "key_value",
        "key": "Notes",
        "value": "Asm M 17/03/2021 04:41 PM:3D multiple"
      },
  {}
    ]
},
  {
    "type": "graph",
    "left_text": "Images",
    "right_text": "17/03/2021 04:41 PM",
    "columns": "2",
    "values": [
      
      {
        "type": "key_value",
        "key": "Max depth",
        "value": ""
      },
      {
        "type": "key_value",
        "key": "Area",
        "value": ""
      },

     
      {
        "type": "graph",
        "key": "",
        "values":"' . $arryaMeasure["maximum_depth"] . '",
        "valMax": 2,
        "color": "247377",
        "colorTop": "56a1b7"
      },
    
      {
        "type": "graph",
        "key": "",
        "values":"' . $arryaMeasure["area"] . '",
        "valMax": 40,
        "color": "f3be57",
        "colorTop": "f3be57"
      }
      ,
       {
        "type": "key_value",
        "key": "Volume",
        "value": ""
      },
      {
        "type": "key_value",
        "key": "Tissue",
        "value": ""
      },
      {
        "type": "graph",
        "key": "",
        "values":"' . $arryaMeasure["volume"] . '",
        "valMax": 60,
        "color": "B3D4FC",
        "colorTop": "2487ff"
      },{
        "type": "graph_area",
        "key": "",

        "granulation": 77,
        "slough": 16,
        "eschar": 7,
        "colorTop": "247377",
        "color": "6495ED"
      }
     
    ]
  }
 

  
 


]';
  return $string;
}

function first()
{ //function parameters, two variables.
  return "string";  //returns the second argument passed into the function
}
https://www.bitdegree.org/learn/best-code-editor/php-array-push-example-2