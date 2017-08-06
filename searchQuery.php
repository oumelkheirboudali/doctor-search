<!-- Practice Fusion Coding Challenge -->
<!-- Similar Doctors -->
<!-- The following site will display up to 10 relevant doctors based on your search. -->
<!-- IMPORTANT: For best results search by a keyword query (e.g. 'Toothache').-->

<html>
    <head>
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script language="javascript" type ="text/javascript"></script>
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified CSS -->
<style>
            
  @import url("styles.css");
  
  .jumbotron{ /* supported by Bootstrap */
    text-shadow: #a9b4c6 0.8em 0.8em 0.9em;
    background-image: url(background.png);
  }
  
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  #container {
    width:960px;
    position:relative;
    text-align:center;
    border:none;
    margin:0 auto;
    padding:30px;
    background-color:white;
    opacity:0.9;
  }
  
</style>
        
        
    </head>
  

<script>

    function doctorSearch(){
        //alert("Clicked!");
        console.log("Hello");
            
        //Clears the table's contents after each new search
        $("#title").html("");
        $("#firstName").html("");
        $("#lastName").html("");
        $("#Image").html("");
        $("#Bio").html("");
        $("#specialty").html("");
        $("#city").html("");
        $("#state").html("");
        	
        //AJAX request from the BetterDoctor API https://api.betterdoctor.com
        $.ajax({
            //get method
            type: "get",
                
            //gets the url from the api 
            url: " https://api.betterdoctor.com/2016-03-01/doctors",
                
            //JSON, or JavaScript Object Notation, is a minimal, readable format for structuring data. 
            //It is used primarily to transmit data between a server and web application, as an alternative to XML.
            dataType: "json",
                
            // https://developer.betterdoctor.com/documentation15#/
            data: {
                "query":$("#searchBar").val(),
                "location":$("#stateBar").val(),
                "user_key":"bbc640041ed17aed279d08cf5b85021e", //my API Key
                "gender":$("#gender").val(),
                "sort":$("#sortValue").val()
            },
        
            success: function(data,status) {
                console.log(data);
                console.log("Successful");
                console.log(data["data"][0]["profile"]["image_url"]);
                for(var i = 0;i<10;i++){
                    console.log(data["data"][i]["profile"]);
                    $("#title").append(data["data"][i]["profile"]["title"] + "<br>");
                    $("#firstName").append(data["data"][i]["profile"]["first_name"] + "<br>");
                    $("#lastName").append(data["data"][i]["profile"]["last_name"] + "<br>");
                    $("#Image").append('<img src="' + data["data"][i]["profile"]["image_url"]  +'"/>' + "<br>");
                    $("#specialty").append(data["data"][i]["specialties"][0]["name"] + "<br>");
                    $("#city").append(data["data"][i]["practices"][0]["visit_address"]["city"] + "<br>");
                    $("#state").append(data["data"][i]["practices"][0]["visit_address"]["state"] + "<br>");
                }

            },
        
            complete: function(data,status) { //optional, used for debugging purposes
                console.log(status);
            }
        
		});//AJAX

    } //End of doctorSearch() function.
        
</script>
    
    <body>
        <center>
        <div class="jumbotron">
        <h1>Doctor Search</h1>
        <img src="dr.png" style="width:50px;height:50px;">
        </div>
        <p id="demo"></p>

<script>
document.getElementById("demo").innerHTML = Date(); //Displays user's date
</script>

<!-- Search bar -->
<div id="container">
        <input class="form-control" type="text" placeholder="enter keyword query (e.g. 'Acne', or 'Toothache')..." id="searchBar">
      
        <br><hr>

<!-- Gender dropdown menu -->        
<div class="btn-group">
    <form>
    Gender: <select name="Gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            </select>
    </form>
        
</div>
<!-- Sort By dropdown menu -->  
    <form>
    Sort By: <select name="sortBy" id="sortValue">
            <option value="first-name-asc">First Name Asc.</option>
            <option value="first-name-desc">First Name Desc.</option>
            <option value="last-name-asc">Last Name Asc.</option>
            <option value="last-name-desc">Last Name Desc.</option>
            </select>
            
    </form>
    
    <!-- State dropdown menu -->      
    <form>
    State:  <select name="distanceSort" id="stateBar" >
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AZ">AZ</option>
            <option value="AR">AR</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="IA">IA</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="ME">ME</option>
            <option value="MD">MD</option>
            <option value="MA">MA</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MS">MS</option>
            <option value="MO">MO</option>
            <option value="MT">MT</option>
            <option value="NE">NE</option>
            <option value="NV">NV</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NY">NY</option>
            <option value="NC">NC</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WV">WV</option>
            <option value="WI">WI</option>
            <option value="WY">WY</option>
            </select>
    </form>
        
    <!-- Calls function doctorSearch() -->
    <button type="button" onclick="doctorSearch()" class="btn btn-success">Search</button>
    <a href="index.php"  type="button" class="btn btn-primary">Home</a>
    <br><br>
    </center>
    
    <!-- Displays Doctor Table -->
    <div class="container">
    <div class="table-responsive">      
          
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Specialty</th>
                <th>City</th>
                <th>State</th>
            </tr>
        </thead>
            
            
        <tbody>
            <tr>
                <td id= "title"></td>
                <td id= "firstName"></td>
                <td id="lastName"></td>
                <td id="specialty"></td>
                <td id="city"></td>
                <td id="state"></td>
            </tr>
        </tbody>
        </table>
        </div>

    </div>
</div
    
</body>
</html>