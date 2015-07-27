	
					<h2>Register</h2>

					<form id="form" method="post" action="register.php" onsubmit="return validateForm()>
					 <input name="image" type="hidden" value="uploads/propic.jpg" />
						
						
					  <p>
							<label>ID No.:</br>
							<input type="text" style="width: 200px; font-weight: bold; color: #222;
text-transform: none;" name="id_no"/></label>
					  </p>
						<p>
							<label>Username &nbsp:</br>
							<input id="username" style="width: 200px; font-weight: bold; color: #222;
text-transform: none;" type="text" name="username" /><br /><span id="status"></span></label>
						</p>
						<p>
							<label>Password:</br>
							<input style="width: 200px; font-weight: bold; color: #222;
text-transform: none;" name="password" type="password" onkeyup="passwordStrength(this.value)" /></label> 
                        <br />
                        <span id="passwordDescription"></span>
                        <span id="passwordStrength" class="strength0"></span>

						</p>
						<p>
							<label>Firstname:</br>
							<input style="width: 200px; font-weight: bold; color: #222;
text-transform: capitalize;" type="text" name="firstname" /></label>
						</p>
						<p>
							<label>Lastname:</br>
							<input style="width: 200px; font-weight: bold; color: #222;
text-transform: capitalize;"" type="text" name="lastname" /></label>
						</p>
						<p>
							<label>Email:<br />
							<input type="text" style="width: 200px; font-weight: bold; color: #222;
text-transform: none;" name="email" /></label>
						</p>
						<p>
							<label>Address:<br/>
							<input style="width: 200px; font-weight: bold; color: #222;
text-transform: capitalize;" type="text" name="address" /></label>
						</p>
						<p>
							<label>Birthdate:<br />
							  <input name="birthdate" type="hidden" size="25" />
						 <div id="bmonth"><select class="" style="width: 100px;
font-weight: normal;
color: #222;" name="birthday_month" ></div>
                         <span id="valmonth" style="display:none;">
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
                      </select></span>
                      <span id="bday">
                         <select name="birthday_day" style="width: 100px;
font-weight: normal;
color: #222;" autocomplete="on"></span> <span id="valday" style="display:none;">
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
                         </select></span>
                        <span id="byear"> <select name="birthday_year" style="width: 100px;
font-weight: normal;
color: #222;" autocomplete="on"></span><span id="valyear" style="display:none">
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
                         </select></span>
						</p>
						<p>
							<label>Gender:</br>
							<select name="gender" style="width: 200px; font-weight: bold; color: #222;
text-transform: none;">
                             <option value="-1" selected="selected">-Select Gender-</option>
                             <option>Female</option>
                             <option>Male</option>
                           </select></label>
						</p><p>
							<label>Course:<br />
							<select name="course" style="width: 200px; font-weight: bold; color: #222;
text-transform: none;">
                           <option value="-1" selected="selected">-Select Course-</option>
                           <option>UG-Computer Science and Engineering 2011</option>
						   <option>UG-Computer Science and Engineering 2012</option>
						   <option>UG-Computer Science and Engineering 2010</option>
						   <option>UG-Computer Science and Engineering 2009</option>
						   <option>PG-Computer Science and Engineering 2011</option>
						   <option>PG-Computer Science and Engineering 2012</option>
						   
                           <option>UG-Mechanical Engineering 2011</option>
						   <option>UG-Mechanical Engineering 2012</option>
						   <option>UG-Mechanical Engineering 2010</option>
						   <option>UG-Mechanical Engineering 2009</option>
						   <option>PG-Mechanical Engineering 2011</option>
						   <option>PG-Mechanical Engineering 2012</option>
						   
						   <option>UG-Electronics and Communication Engineering 2011</option>
						   <option>UG-Electronics and Communication Engineering 2012</option>
						   <option>UG-Electronics and Communication Engineering 2010</option>
						   <option>UG-Electronics and Communication Engineering 2009</option>
						   <option>PG-Electronics and Communication Engineering 2011</option>
						   <option>PG-Electronics and Communication Engineering 2012</option>
						   						   
                         </select></label>
						</p>
                        <p>
							<label>Year:</br>
							<input style="width: 200px; font-weight: bold; color: #222;
text-transform: uppercase;"" type="text" name="yr_sec" /></label>
						</p>
													
						<p><input type="checkbox" name="checkbox" id="check" />
                                 <a href="#">Terms of Use</a><br /><br />
							<input class="button" value="Submit" type="submit" name="register" />
							<input class="button" value="Clear" type="reset" name="reset" />
						</p>

					</form>
