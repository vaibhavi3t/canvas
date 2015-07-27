<fieldset style="width: 700px; background-color:white">
					<legend>Basic and Contact information</legend>
					<div id="edit" style="padding-left: 620px;">
					<a>Edit</a></div>
					<div id="cancel1" style="display:none; padding-left: 620px;">
					<a>Cancel</a>
					</div>
					
					<div id="form01">
					<span style="color:#222; font-weight:bold;">Name : </span>
					<span id="info" style="margin-left: 61px;">
					<?php 
					echo $display['firstname'] . " " . $display['lastname']?>
					</span><br />
					<span style="color:#222; font-weight:bold;">Address : </span>
					<span id="info" style="margin-left: 47px;">
					<?php echo $display['address'] ?>
					</span><br />
					<?php $hometown = $display['hometown'];
					if($hometown != ""){
					echo '<span style="color:#222;; font-weight:bold;">Hometown : </span>
					<span id="info" style="margin-left: 30px;">' . $hometown . '</span><br />'; } ?>
					<?php $contact = $display['contact_no'];
					if($contact != ""){
					echo '<span style="color:#222;; font-weight:bold;">Contact No. : </span><span id="info" style="margin-left: 25px;">' . $contact .'</span><br />'; } ?>
					<span style="color:#222; font-weight:bold;">
					Email : </span><span id="uu" style="margin-left: 64px;">
					<?php echo $display['email'] ?></span><br />
					<span style="color:#222; font-weight:bold;">
					Birthdate : </span><span id="info" style="margin-left: 39px;">
					<?php echo $display['birthdate'] ?>
					</span><br />
					<span style="color:#222; font-weight:bold;">
					Gender : </span><span id="info" style="margin-left: 53px;">
					<?php echo $display['gender'] ?>
					</span><br />
					<?php $rel = $display['relationship'];
					if($rel != ""){
					echo '<span style="color:#222;; font-weight:bold;">Relationship : </span><span id="info" style="margin-left: 20px;">' .$rel . '</span><br />'; }
					?>
					</div>
					<div id="forms" style="display:none;">
					<form id="form1" method="post" action="info.php">
					<p>
					<label for="text_field">Firstname:</label>
					<div id="entry-text">
					<input type="text" id="cap" name="firstname" value="<?php echo $display['firstname'] ?>"/></div>
					</p>
					<p>
							<label for="text_field">Lastname:</label>
					  <div id="entry-text">
							<input type="text" id="cap" name="lastname"   value="<?php echo $display['lastname'] ?>"/></div>
						</p>
						<p><label for="text_field">Address:</label>
					  <div id="entry-text">
							 <input type="text" id="cap" name="address"   value="<?php echo $display['address'] ?>" /></div>
						</p>
						<p><label for="text_field">Hometown:</label>
						<div id="entry-text">
						 <input type="text" id="cap" name="hometown"   value="<?php echo $display['hometown'] ?>" /></p></div>
						<p>
						  <label for="text_field">Contact No.:</label>
					  <div id="entry-text">
							<input type="text" id="cap" name="contact_no"   value="<?php echo $display['contact_no'] ?>" /></div>
						<p><label for="text_field">Email:</label>
						<div id="entry-text">
							 <input type="text" name="email" id="username" value="<?php echo $display['email'] ?>" /></div>
						</p>
						<p><label for="text_field">Birthdate:</label>
					  <div id="entry-text">
							 <select class="" style="width: 100px;" name="birthday_month" onChange="return run_with(this, [&quot;editor&quot;], function() {editor_date_month_change(this, &quot;birthday_day&quot;, &quot;birthday_year&quot;);});">
                                  <option selected="selected"><?php echo $display['b_month'] ?></option>
                                  <option value="-1">Month:</option>
                                  <option value="January">Jan</option>
                                  <option value="February">Feb</option>
                                  <option value="March">Mar</option>
                                  <option value="April">Apr</option>
                                  <option value="May">May</option>
                                  <option value="June">Jun</option>
                                  <option value="July">Jul</option>
                                  <option value="August">Aug</option>
                                  <option value="September">Sep</option>
                                  <option value="October">Oct</option>
                                  <option value="November">Nov</option>
                                  <option value="December">Dec</option>
                        </select>
                                <select name="birthday_day" style="width: 100px;"  onchange="bagofholding" autocomplete="on">
                                  <option selected="selected"><?php echo $display['b_day'] ?></option>
                                  <option value="-1">Day:</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                                  <option value="21">21</option>
                                  <option value="22">22</option>
                                  <option value="23">23</option>
                                  <option value="24">24</option>
                                  <option value="25">25</option>
                                  <option value="26">26</option>
                                  <option value="27">27</option>
                                  <option value="28">28</option>
                                  <option value="29">29</option>
                                  <option value="30">30</option>
                                  <option value="31">31</option>
                                </select>
                                <select name="birthday_year" style="width: 100px;" onChange="return run_with(this, [&quot;editor&quot;], function() {editor_date_month_change(&quot;birthday_month&quot;,&quot;birthday_day&quot;,this);});" autocomplete="on">
                                  <option selected="selected"><?php echo $display['b_year'] ?></option>
                                  <option value="-1">Year:</option>
                                  <option value="2011">2011</option>
                                  <option value="2010">2010</option>
                                  <option value="2009">2009</option>
                                  <option value="2008">2008</option>
                                  <option value="2007">2007</option>
                                  <option value="2006">2006</option>
                                  <option value="2005">2005</option>
                                  <option value="2004">2004</option>
                                  <option value="2003">2003</option>
                                  <option value="2002">2002</option>
                                  <option value="2001">2001</option>
                                  <option value="2000">2000</option>
                                  <option value="1999">1999</option>
                                  <option value="1998">1998</option>
                                  <option value="1997">1997</option>
                                  <option value="1996">1996</option>
                                  <option value="1995">1995</option>
                                  <option value="1994">1994</option>
                                  <option value="1993">1993</option>
                                  <option value="1992">1992</option>
                                  <option value="1991">1991</option>
                                  <option value="1990">1990</option>
                                  <option value="1989">1989</option>
                                  <option value="1988">1988</option>
                                  <option value="1987">1987</option>
                                  <option value="1986">1986</option>
                                  <option value="1985">1985</option>
                                  <option value="1984">1984</option>
                                  <option value="1983">1983</option>
                                  <option value="1982">1982</option>
                                  <option value="1981">1981</option>
                                  <option value="1980">1980</option>
                                  <option value="1979">1979</option>
                                  <option value="1978">1978</option>
                                  <option value="1977">1977</option>
                                  <option value="1976">1976</option>
                                  <option value="1975">1975</option>
                                  <option value="1974">1974</option>
                                  <option value="1973">1973</option>
                                  <option value="1972">1972</option>
                                  <option value="1971">1971</option>
                                  <option value="1970">1970</option>
                                </select></div>
						</p>
						<p><label for="text_field">Gender:</label>
					  <div id="entry-text">
							 <select name="gender" id="drop cap">
                                <option selected="selected"><?php echo $display['gender'] ?></option>
                                <option value="-1">-Select Gender-</option>
                                <option>Female</option>
                                <option>Male</option>
                          </select></div>
						</p>
						<p><label for="text_field">Relationship:</label>
						<div id="entry-text">
							 <select name="relationship" id="drop cap">
                                <option selected="selected"><?php echo $display['relationship'] ?></option>
                                <option value="-1">-Select Status-</option>
                                <option>Single</option>
                                <option>In a relationship</option>
                                <option>Married</option>
                                <option>Widow</option>
                                <option>Seperated</option>
                          </select>
                      </div>
						</p><p id="but"><br />
							<input class="button" value="Submit" type="submit" name="edit1"/>
							<input class="button" value="Clear" type="reset" />
						</p>
						
					</form></div>
				</fieldset>
				<br />