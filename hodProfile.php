
<!DOCTYPE html>
<html>
	<head>
	

		<title>UTH Incident Tracking System</title>

		<!-- Bootstrap Core CSS -->
		
	</head>
	<body>
		<div class=\"container\">

			<div class=\"hero-unit\">
				<form  action= "checkbox.php" method="Post">
					<table class="tg" border="1" align="center" width="1200">
						<tr>
							<th width="192" rowspan="3" ><img src="1Zambia.jpg" width="150" height="150" /></th>
							<th class="tg-yw4l" colspan="9" bgcolor="grey"><h3>THE UNIVERSITY TEACHING HOSPITAL LABORATORY</h3>
						    <p>&nbsp;</p></th>
							<th width="195" rowspan="3" ><img src="1Zambia.jpg" width="150" height="150" /></th>
						</tr>
						<tr>
						  <th class="tg-yw4l" colspan="9" ><h3>Non-Conforming Event (NCE) Report Form<h3></th>
					  </tr>
						<tr>
						  <th class="tg-yw4l" colspan="8" ><h3>Document ID:</h3></th>
						  <th width="390" class="tg-yw4l"><label for="documentId"></label>
					      <input type="text" name="documentId" id="documentId"></th>
				      </tr>
						
					</table>
					<table border="1" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td width= "300" height="30" align="center"><h3>Reference No.</h3></td>
								<td width="300" height="30" > <h3>
								  <input type="text" name="refId" id="refId">
                                </h3></td>
					  </tr></br>
				  </table></br>
					<table border="1" align="center" cellspacing="0" cellpadding="0" width="1200">
					  <tr>
						<td colspan="3" bgcolor="#D3D3D3"><h3>SPECIMEN MANAGEMENT</h3></td>
						<th colspan="3" bgcolor="#D3D3D3"><h3> REPORTING</h3></th>
						<th colspan="3" bgcolor="#D3D3D3"><h3> QC/ EQA</h3></th>
					  </tr>
					  <tr>
						<td colspan="3" rowspan="3" valign="top">
					<h4><input type="checkbox" name="category[]" value="Request form incompletely filled">Request form incompletely filled<h4>
					<h4><input type="checkbox" name="category[]" value="Request form/sample not received">Request form/sample not received</h4>
					<h4><input type="checkbox" name="category[]" value="Mismatched request form/sample">Mismatched request form/sample<h4>
					<h4><input type="checkbox" name="category[]" value="Specimen Lost">Specimen Lost</h4>
					<h4><input type="checkbox" name="category[]" value="Specimen Labeling">Specimen Labeling<h4>
					<h4><input type="checkbox" name="category[]" value="Damaged Specimen">Damaged Specimen</h4>
					<h4><input type="checkbox" name="category[]" value="Specimen Transport delayed">Specimen Transport delayed<h4>
					<h4><input type="checkbox" name="category[]" value="Specimen packaged wrongly">Specimen packaged wrongly</h4>
					<h4><input type="checkbox" name="category[]" value="Incorrect Processing">Incorrect Processing<h4>
					<h4><input type="checkbox" name="category[]" value="Specimen delivered to wrong Unit">Specimen delivered to wrong Unit</h4>
					<h4><input type="checkbox" name="category[]" ><input type="text" placeholder="Other" name="specimenOther" id="specimenOther"><h4>
				
				    
				    </td>
						<td colspan="3" rowspan="3" valign="top">
						<h4><input type="checkbox" name="report[]" value="Incorrect results reported">Incorrect results reported<h4>
						<h4><input type="checkbox" name="report[]" value="Incorrect report issued">Incorrect report issued</h4>
						<h4><input type="checkbox" name="report[]" value="Incorrect results transcribed">Incorrect results transcribed<h4>
						<h4><input type="checkbox" name="report[]" value="Computer entry error">Computer entry error</h4>
						<h4><input type="checkbox" name="report[]" value="Delay in reporting results">Delay in reporting results<h4>
						<h4><input type="checkbox" name="report[]" value="Delay in authorizing results">Delay in authorizing results</h4>
						<h4><input type="checkbox" name="report[]" value="Critical report not released promptly">Critical report not released promptly<h4>
						<h4><input type="checkbox" name="report[]" value="Wrong report caught just before release">Wrong report caught just before release</h4>
						<h4><input type="checkbox" name="report[]"><input type="text" placeholder="Other" name="reportingOther" id="specimenOther"><h4>
					
					</td>
					<td colspan="3" rowspan="3" valign="top">
						<h4><input type="checkbox" name="QC/EQA[]" value="Unacceptable QC /EQA result">Unacceptable QC /EQA result<h4>
						<h4><input type="checkbox" name="QC/EQA[]" value="EQA result not sent/sent late">EQA result not sent/sent late</h4>
						<h4><input type="checkbox" name="QC/EQA[]" value="EQA materials not delivered">EQA materials not delivered<h4>
						<h4><input type="checkbox" name="QC/EQA[]" value="EQA materials delivered late">EQA materials delivered late</h4>
						<h4><input type="checkbox" name="QC/EQA[]" value="QC materials delivered late">QC materials delivered late <h4>
						<h4><input type="checkbox" name="QC/EQA[]" value="Test results verified without QC">Test results verified without QC</h4>
						<h4><input type="checkbox" name="QC/EQA[]"><input type="text" placeholder="Other" name="qcOther" id="specimenOther"><h4>
					</td>
					  </tr>
					  <tr>
					  </tr>
					  <tr>
					  </tr>
					  <tr>
						<td colspan="3" bgcolor="#D3D3D3"><h3> SUPPLIES</h3></td>
						<td colspan="3" bgcolor="#D3D3D3"><h3> COMPLAINTS</h3></td>
						<td colspan="3" bgcolor="#D3D3D3"><h3> COMPUTER</h3></td>
					  </tr>
					  <tr>
						<td colspan="3" rowspan="3" valign="top">
							<h4><input type="checkbox" name="supplies[]" value="External problem">External problem<h4>
							<h4><input type="checkbox" name="supplies[]" value="Improperly prepared reagent">Improperly prepared reagent</h4>
							<h4><input type="checkbox" name="supplies[]" value="Reagent Expiry">Reagent Expiry<h4>
							<h4><input type="checkbox" name="supplies[]" value="Recalled lot">Recalled lot</h4>
							<h4><input type="checkbox" name="supplies[]" value="Change in lot number overlooked">Change in lot number overlooked<h4>
							<h4><input type="checkbox" name="supplies[]" ><input type="text" placeholder="Other" name="suppliesOther" id="specimenOther"><h4>
						</td>
						<td colspan="3" rowspan="3" valign="top">
							<h4><input type="checkbox" name="complaints[]" value="Complaint by clinician">Complaint by clinician<h4>
							<h4><input type="checkbox" name="complaints[]" value="Complaint by patient">Complaint by patient</h4>
							<h4><input type="checkbox" name="complaints[]" value="omplaint by staff member">Complaint by staff member<h4>
							<h4><input type="checkbox" name="complaints[]" value="Complaint by patient’s relative">Complaint by patient’s relative</h4>
							<h4><input type="checkbox" name="complaints[]" ><input type="text" placeholder="Other" name="qcOther" id="complaintOther"><h4>
						</td>
						<td colspan="3" rowspan="3" valign="top">
								<h4><input type="checkbox" name="computer[]" value="LIS-related (Please fill in LIS Issues Form LIS-FM-001)">LIS-related (Please fill in LIS Issues Form LIS-FM-001)<h4>
								<h4><input type="checkbox" name="computer[]" value="Software failure">Software failure</h4>
								<h4><input type="checkbox" name="computer[]" value="Hardware failure">Hardware failure<h4>
								<h4><input type="checkbox" name="computer[]" ><input type="text" placeholder="Other" name="computerOther" id="specimenOther"><h4>
						</td>
					  </tr>
					  <tr>
					  </tr>
					  <tr>
					  </tr>
					  <tr>
						<td colspan="3" bgcolor="#D3D3D3"><h3> EQUIPMENT</h3></td>
						<td colspan="3" bgcolor="#D3D3D3"><h3> SAFETY</h3></td>
						<td colspan="3" bgcolor="#D3D3D3"><h3>OTHERS</h3></td>
					  </tr>
					  <tr>
						<td colspan="3" rowspan="3" valign="top">
							<h4><input type="checkbox" name="equipment[]" value="Equipment malfunctionv">Equipment malfunction<h4>
							<h4><input type="checkbox" name="equipment[]" value="Computer hardware problem">Computer hardware problem</h4>
							<h4><input type="checkbox" name="equipment[]" value="Computer software problem">Computer software problem<h4>
							<h4><input type="checkbox" name="equipment[]" value="Wrong calibration values">Wrong calibration values</h4>
							<h4><input type="checkbox" name="equipment[]" value="Wrong calibrator used">Wrong calibrator used<h4>
							<h4><input type="checkbox" name="equipment[]"><input type="text" placeholder="Other" name="equipOther" id="specimenOther"><h4>
						
						</td>
						<td colspan="3" rowspan="3" valign="top">
							<h4><input type="checkbox" name="safety[]" value="Biological/Chemical Spill">Biological/Chemical Spill<h4>
							<h4><input type="checkbox" name="safety[]" value="Fire">Fire</h4>
							<h4><input type="checkbox" name="safety[]" value="Waste Management">Waste Management<h4>
							<h4><input type="checkbox" name="safety[]" value="Incident/accident">Incident/accident</h4>
							<h4><input type="checkbox" name="safety[]"><input type="text" placeholder="Other" name="qcOther" id="safeOther"><h4></td>
						<td colspan="3" rowspan="3" valign="top">
							<h4><input type="checkbox" name="others[]" value="Power interruption">Power interruption<h4>
							<h4><input type="checkbox" name="others[]" value="Water Interruption">Water Interruption</h4>
							<h4><input type="checkbox" name="others[]" value="Temperature out of range">Temperature out of range<h4>
							<h4><input type="checkbox" name="others[]" ><input type="text" placeholder="Other" name="qcOther" id="specimenOther"><h4>
						
						</td>
					  </tr>
					  <tr>
					  </tr>
					  <tr>
					  </tr>
					</table><br>
					<table border="1"  align="center" cellspacing="0" cellpadding="0" width="1200">
						  <tr>
							<th colspan="11" align="left" bgcolor="#D3D3D3"><h3>INFORMATION</h3></th>
						  </tr>
						  <tr>
							<td colspan="6"><h3>Date of Incident:<input type="Date" name="dateOfIncidenct" id="dateOfIncidenct">
							</h3></td>
							<td colspan="5"><h3>Time of Incident:<input type="Time" name="incidentTime" id="incidentTime"></h3></td>
						  </tr>
						  <tr>
							<td colspan="6"><h3>Laboratory Unit: <input type="text" name="labUnit" id="labUnit">
							</h3></td>
							<td colspan="5"><h3>Site of Incident:</h3></td>
						  </tr>
						  <tr>
							<td colspan="7"><h3>Name(of equipment/supply/patient):<input type="text" name="nameOfPatient" id="nameOfPatient">
							</h3></td>
							<td colspan="4"><h3>Lot#/ID #:<input type="text" name="lotId" id="lotId">
							</h3></td>
						  </tr>
						  <tr>
							<td colspan="11"><h3>Specimen : 
							    <input type="radio" name="radio" id="blood" value="blood">Blood
							  <input type="radio" name="radio" id="urine" value="urine">Urine
							  <input type="radio" name="radio" id="stool" value="stool">Stool
							  <input type="radio" name="radio" id="sputum" value="sputum">Sputum
							  <input type="radio" name="radio" id="csf" value="csf">CSF
							  <input type="radio" name="radio" id="swab" value="swab">Swab
							  <input type="radio" name="radio" id="boneMarrow" value="boneMarrow">Bone Marrow
							  <input type="radio" name="radio" id="infoSpecimenOther" value="infoSpecimenOther"><input type="text" name="infoSpecimen" placeholder="Other(Specify)" id="infoSpecimen">
							</h3></td>
						  </tr>
						  <tr>
							<td colspan="11"><h3>NCE Identified by (tick): 
							  <input type="radio" name="radio" id="labstaff" value="labstaff">Lab staff
							  <input type="radio" name="radio" id="clinicalstaff" value="clinicalstaff">Clinical staff
							  <input type="radio" name="radio" id="patient" value="patient">Patient
							  <input type="radio" name="radio" id="identOthers" value="identOthers"><input placeholder="Others Specify" type="text" name="idetifiedBy" id="idetifiedBy">
							</h3></td>
						  </tr>
						  <tr>
							<td colspan="5" width="500"><h3>Clinical area notified? <input type="text" name="clinicalAreaIde" id="clinicalAreaIde">
							</h3></td>
							<td colspan="4" width="400"><h3>Person notified: <input type="text" name="personNotified" id="personNotified">
							</h3></td>
							<td colspan="2" width="300"><h3>Date: <input type="Date" name="dateNotified" id="dateNotified">
							</h3></td>
						  </tr>
						  <tr>
							<td colspan="5" width="500"><h3>Incident reported to/Responsible person:<input type="text" name="reportedTo" id="reportedTo">
							</h3></td>
							<td colspan="4" width="400"><h3>Name: <input type="text" name="reporter" id="reporter">
							</h3></td>
							<td colspan="2" width="300"><h3>Date: <input type="Date" name="dateReported" id="dateReported">
							</h3></td>
						  </tr>
						  <tr>
							<td colspan="5" width="500"><h3>Report Initiated by: <input type="text" name="reportInitiater" id="reportInitiater">
							</h3></td>
							<td colspan="4" width="400"><h3>Designation: <input type="text" name="disignition" id="disignition">
							</h3></td>
							<td colspan="2"  width="300"><h3>Sign: <input type="text" name="signature" id="signature">
							</h3></td>
						  </tr>
					</table><br>
					<table border="1" align="center" cellspacing="0" cellpadding="0" width="1200">
						<tr>
							<th colspan="9" bgcolor="#D3D3D3" align="left" ><h3>DESCRIPTION OF NCE and IMMEDIATE ACTION taken</h3></th>
						</tr>
						<tr>
					    </tr>
						<tr>
							<td colspan="9"><label for="description"></label>6<h3>
							  <textarea name="description" rows="4" cols="100" id="description"></textarea>
							</h3></td>
						</tr>
					</table><br>
					<table border="1" align="center" cellspacing="0" cellpadding="0" width="1200">
						<tr>
							<th colspan="9" align="left" bgcolor="#D3D3D3"><h3><strong>CLASSIFICATION OF NCE (By Scientist In-Charge/Designee)</strong><br>
																	Tick appropriate class based on impact/severity of NCE:</h3></th>
						</tr>
						<tr>
							<td colspan="3"><h3>Tick here</h3></td>
							<td colspan="2"><h3>Class</h3></td>
							<td colspan="6"><h3>Description of NCE Severity</h3></td>
						</tr>
						<tr>
							<td colspan="3"><h3><input type="radio"><h3></td>
							<td colspan="2"><h3>Class I</h3></td>
							<td colspan="6"> <h3><strong>Low  </strong> (No known adverse outcome)</h3> </td>
						 </tr>
						 <tr>
							<td colspan="3"><h3><input type="radio"><h3></td>
							<td colspan="2"><h3>Class II</h3></td>
							<td colspan="6"><h3>Medium (Minor self-limiting adverse outcome)</h3></td>
						 </tr>
						 <tr>
							<td colspan="3"><h3><input type="radio"><h3></td>
							<td colspan="2"><h3>Class III</h3></td>
							<td colspan="6"><h3>High (Adverse outcome with or without successful intervention)</h3></td>
						 </tr>
						 <tr>
							<td colspan="4" width="400"><h3>Name: <input type="text" name="name" id="name">
							</h3></td>
							<td colspan="4" width="400"><h3>Date: <input type="Date" name="date" id="date">
							</h3></td>
							<td colspan="4"><h3>Sign: <input type="text" name="sign" id="sign">
							</h3></td>
						 </tr>
					</table><br>
					<table border="1" align="center" cellspacing="0" cellpadding="0" width="1200">
						<tr>
							<th colspan="9" bgcolor="#D3D3D3" align="left"><h3>CORRECTIVE ACTION/PREVENTIVE ACTION (Filled by Scientist In-Charge/Designee):</h3></th>
						</tr>
						<tr>
							<td colspan="9"><label for="correctiveAction"></label>							  <h3>
							  <textarea name="correctiveAction" id="correctiveAction"></textarea>
							</h3></td>
						</tr>
						<tr>
							<td colspan="5" width="400"><h3>Name: <input type="text" name="correctiveName" id="correctiveName">
							</h3></td>
							<td colspan="2" width="400"><h3>Date: <input type="Date" name="correctiveDate" id="correctiveDate">
							</h3></td>
							<td colspan="2" width="400"><h3>Sign: <input type="text" name="correctiveSign" id="correctiveSign">
							</h3></td>
						</tr>
					</table><br>
					<table border="1" align="center" cellspacing="0" cellpadding="0" width="1200">
						<tr>
							<th colspan="9" bgcolor="#D3D3D3" align="left"><h3>REVIEW OF EFFECTIVENESS OF CORRECTIVE/PREVENTIVE ACTION (By Unit Head/Designee)</h3></th>
						</tr>
						<tr>
							<td colspan="9"><label for="correctiveAction"></label>							  <h3>
							  <textarea name="correctiveAction" id="correctiveAction"></textarea>
							</h3></td>
						</tr>
						<tr>
							<td colspan="5" width="400"><h3>Name: <input type="text" name="effectiveName" id="effectiveName">
							</h3></td>
							<td colspan="2" width="400"><h3>Date: <input type="Date" name="effectiveName" id="effectiveDate">
							</h3></td>
							<td colspan="2" width="400"><h3>Sign: <input type="text" name="effectiveName" id="effectiveSign">
							</h3></td>
						</tr>
					</table><br>
					<table class="tg"  align="center" height="50" width="100">
						<tr>
						 
						  <th width="100"class="tg-yw4l"><label for="documentId"></label>
					      
				            <h3><input type="submit" name="submit" id="submit" value="Submit"></h3>
						  </tr>
					</table>
				</form>	
			</div>
		</div>
	</body>
</html>