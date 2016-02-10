@extends('layouts.PrimaPaginaLayout')

@section('DatePersonale')
<style type="text/css">

label { display: inline-block; width: 140px; text-align: right; }​
</style>

<div class = "container">

<div class = "SetarileContului">

		<form id = "DateForm" method = "POST" action = "/EditDate">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<div class = "col">
			<label class = "col" for = "NoulEmail" >Nume<b> * </b>:</label>
			<input style = "font-size:15px;"type = "text" name = "Nume" id="Nume" value = "<?php if(DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first()){$date = DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first();echo $date->nume; }?>"></input>
		<div style = "vertical-align: top;"id = "eNume"> </div>

		</div>
		<div id = "radio-demo"style = "font-weight:normal;">

		
		
		
	</div>
</div>

	<div class="form-group">
		<div class = "col">
			<label class = "col" for = "NoulEmail" >Prenume<b> * </b>:</label>
			<input style = "font-size:15px;"type = "text" name = "Prenume" id="Prenume" value = "<?php if(DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first()){$date = DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first();echo $date->prenume; }?>"></input>
		<div style = "vertical-align: top;"id = "ePrenume"> </div>
		</div>

	</div>

	<div class="form-group">
		<div class = "col">
			<label class = "col" for = "NoulEmail" >Adresa<b> * </b>:</label>
			<input style = "font-size:15px;"type = "text" name = "Adresa" id="Adresa" value = "<?php if(DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first()){$date = DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first();echo $date->adresa; }?>"></input>
		<div style = "vertical-align: top;"id = "eAdresa"> </div>
		</div>

	</div>
	
	
	<div class = "form-group">
		<div class = "col">
		
<?php function date_dropdown($year_limit = 0){

        $html_output = '<div id="date_select" >'."\n";

        $html_output .= '<label class = "col" for="date_day">Data nasterii<b> * </b>:</label>'."\n";

        $html_output .= ' <select name="date_day" id="day_select">'."\n";

            for ($day = 1; $day <= 31; $day++) {
$ziua = DB::table("users_data")->where("users_data_id",Auth::user()->user_id)->first();
if($ziua->ziua == $day)

	$html_output .= '<option selected="selected" > ' . str_pad($day,2,"0",STR_PAD_LEFT) . '</option>'."\n";
else 
                $html_output .= '<option > ' . str_pad($day,2,"0",STR_PAD_LEFT) . '</option>'."\n";

            }

        $html_output .= '</select>'."\n";


        $html_output .= '<select name="date_month" id="month_select" >'."\n";

        $months = array("", "Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie");

            for ($month = 1; $month <= 12; $month++) {
$ziua = DB::table("users_data")->where("users_data_id",Auth::user()->user_id)->first();
if($ziua->luna == $month)
		
		$html_output .= '<option selected = "selected" value="' . str_pad($month,2,"0",STR_PAD_LEFT) . '">' . $months[$month] . '</option>'."\n";
else
                $html_output .= '<option value="' . str_pad($month,2,"0",STR_PAD_LEFT) . '">' . $months[$month] . '</option>'."\n";

            }

        $html_output .= '</select>'."\n";


        $html_output .= '<select name="date_year" id="year_select">'."\n";

            for ($year = 1900; $year <= (date("Y") - $year_limit); $year++) {
$ziua = DB::table("users_data")->where("users_data_id",Auth::user()->user_id)->first();
if($ziua->anul == $year)
		 $html_output .= '<option selected = "selected">' . $year . '</option>'."\n";
		else
                $html_output .= '<option>' . $year . '</option>'."\n";

            }

        $html_output .= '</select>'."\n";


        $html_output .= '</div>'."\n";

    return $html_output;

}
echo date_dropdown();
 ?>

		</div>
	</div>

	<div class = "form-group">
		<div class = "col">
			
	  

        <label class = "col" for="oras">Localitate<b> * </b>:</label>
        <input type = "textbox" name = "oras" value = "<?php if(DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first()){$date = DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first();echo $date->localitate; }?>">
 
		</div>
	
	</div>

	<div class = "form-group">
		<div class = "col">
<label class = "col" for "sexul">Sexul:</label>
			<select name = "sexul">
			<?php 	$ziua = DB::table("users_data")->where("users_data_id",Auth::user()->user_id)->first();
if($ziua->sexul == 'Masculin')
				echo '<option value = "Masculin">Masculin</option>
				<option value = "Feminin">Feminin</option>';
			else
				echo '<option value = "Feminin">Feminin</option>
			<option value = "Masculin">Masculin</option>';
?>
			</select>

	</div>
	</div>
<div>Doresc ca datele personale sa fie afisate public:</div>
	<label>
		@if($conf->privacy != 'N')
		<input type = "radio" name = "privacy" value = "N">Nu
		@else 
		<input checked type = "radio" name = "privacy" value = "N">Nu
		@endif
	</label>
	<label>
		@if($conf->privacy != 'Y')
		<input type = "radio" name = "privacy" value = "Y">Da
		@else 
		<input checked type = "radio" name = "privacy" value = "Y">Da
		@endif
	</label>

<br><br>
<input style = "margin-left:250px;"class = "btnNou" id= "DateSubmit" type = "submit" value = "Modifica"></input>
		




</form>
</div>

</div>

@stop