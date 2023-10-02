function sbt(f)
{
	f.submit();
}

function check(id)
{
	var patt = /^[a-zA-Z0-9\_ \-\.&]+$/;
	var patt_simnum = /^[0-9\.]+$/;
	var txt = document.getElementById(id).value;
	
	if(txt == "")
		document.getElementById(id).style.backgroundColor = "#ff4d4d";
	else if(id=="simnum" && !patt_simnum.test(txt))
		document.getElementById(id).style.backgroundColor = "#ff4d4d";
	else if(!patt.test(txt))
		document.getElementById(id).style.backgroundColor = "#ff4d4d";//red
	else
	{
		document.getElementById(id).style.backgroundColor = "";
		document.getElementById("msg-error").innerHTML = "";
	}
}

//Verifica daca campurile din pagina reconfigureaza aparat sunt completate bine (doar caractere alfanumerice + spatiu, underline si liniuta)
function reconf(f)
{
	var patt = /^[a-zA-Z0-9\_ \-\.&]+$/;//(doar caractere alfanumerice + spatiu, underline, punct sau liniuta)
	var town = document.getElementById("town").value;
	var place = document.getElementById("place").value;
	var details = document.getElementById("details").value;
	var simnum = document.getElementById("simnum").value;
	var user_type = document.getElementById("user").value;
	
	if(user_type == "su")
		if(document.getElementById("NV9").checked == false && document.getElementById("NV10").checked == false)
		{
			document.getElementById("NV9").style.backgroundColor = "#ff4d4d";//red
			document.getElementById("NV10").style.backgroundColor = "#ff4d4d";//red
			document.getElementById("msg-error").innerHTML = "<b>Eroare:</b> V&#259; rug&#259;m s&#259; selecta&#355;i un validator.<br>."; // Va rugam sa selectati un validator
		}
		
	//daca sunt completate toate campurile
	if(town !== '' && place !== '' && details !== '' && simnum !== '')
	{
		//daca campurile din pagina reconfigureaza aparat sunt completate bine (doar caractere alfanumerice + spatiu, underline si liniuta)
		if(patt.test(town) && patt.test(place) && patt.test(details) && patt.test(simnum))
		{
			document.getElementById("msg").value = "Sunteti sigur ca vreti sa schimbati datele aparatului?";
			f.action="index.php?e=6";//redirectionare catre pagina mesage in care se confirma comanda
			f.submit();
		}//end if campuri completate bine
	}//end if completate toate campurile
}//end reconf

//functie pentru redictare folosita la redictarea de pe pagina configurari useri catre pagina creeaza user
function add_acc(f, arg)
{
	var e = document.getElementById("mySelect");
	
		//daca este selctat vreun user
	if(e.selectedIndex != 0)
	{
		f.action=arg;
		f.submit();
	}//end if selcatt user
	else
	{
		document.getElementById("msg_useri").value = "<b>Eroare:</b> Va rugam sa selectati un user.";
		f.submit();
	}//end else niciun user selctat
	
	
}

function add_aparat(f, arg)
{

		f.action=arg;
		f.submit();
	
}


//functia sterge un cont
function dlt(f)
{
	//console.error("Delete");
	
	var e = document.getElementById("mySelect");
	
	//daca este selctat vreun user
	if(e.selectedIndex != 0)
	{
		document.getElementById("msg_useri").value="Sunteti sigur ca vreti sa stergeti contul";
		document.getElementById("button").value = "dlt_acc";
		f.action="index.php?e=6";//redirectionare catre pagina mesage in care se confirma comanda
		f.submit();
	}//end if selcatt user
	else
	{
		document.getElementById("msg_useri").value = "<b>Eroare:</b> Va rugam sa selectati un user.";
		f.submit();
	}//end else niciun user selctat
}//end dlt

//verifica daca parolele sunt la fel 
function validate(f)
{
	var pass1 = document.getElementById("pass1").value;
	var pass2 = document.getElementById("pass2").value;
	var e = document.getElementById("mySelect");//select pentru user selectat
	
	//daca nu este selectat niciun user
	if(e.selectedIndex == 0)
	{
		document.getElementById("msg_useri").value = "<b>Eroare:</b> Va rugam sa selectati un user.";
		f.submit();
	}//end if user neselectat
	else
	{
		//daca toate campurile nu sutn completate
		if(pass1 == '' || pass2 == '')
		{
			document.getElementById("msg_useri").value = "<b>Eroare:</b>Va rugam sa completati toate campurile.";
			f.submit();
		}//end if campuri necompletate
		else
			//daca difera parolele
			if (pass1 != pass2)
			{
				document.getElementById("msg_useri").value = "<b>Eroare:</b>Parolele nu sunt la fel.";
				f.submit();
			}//end if difera parolele
			else 
			{
				document.getElementById("msg_useri").value="Sunteti sigur ca vreti sa resetati parola";
				document.getElementById("button").value = "res_pass";
				f.action="index.php?e=6";//redirectionare catre pagina mesage in care se confirma comanda
				f.submit();
			}//end else parole la fel
	}//end else user selectat
}//end validate

//forma din pagina add_acc, functia adauga un cont daca parolele sunt la fel si toate capmurile sunt completate
function add_acc_form2(f)
{
	var user = document.getElementById("name").value;
	var pass1 = document.getElementById("pass1_f2").value;
	var pass2 = document.getElementById("pass2_f2").value;
	
	//daca vreun camp nu este completat
	if(pass1 == '' || pass2 == '' || user == '')
		document.getElementById("msg_add_useri").value = "Va rugam sa completati toate campurile.";
	else
	{
		//daca parolele difera
		if (pass1 != pass2)
			document.getElementById("msg_add_useri").value = "Parolele nu sunt la fel.";
		else 
		{
			document.getElementById("msg_add_useri").value = "Sunteti sigur ca vreti sa adaugati un cont nou?";
			f.action="index.php?e=6";//redirectionare catre pagina mesage in care se confirma comanda
		}//end else parole bune
	}//end else campuri completate
	f.submit();
}//end add_acc_form2