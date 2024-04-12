let features_s_form =document.getElementById('features_s_form');
let facilities_s_form =document.getElementById('facilities_s_form');

features_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_features();
});
function add_features()
{
    let data = new FormData();
    data.append('name', features_s_form.elements['feature_name'].value);
    data.append('add_features','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true);

    xhr.onload = function() {
        // console.log(this.responseText);
        var myModal = document.getElementById('features-s')
        var modal = bootstrap.Modal.getInstance(myModal)
        modal.hide();
    if(this.responseText ==1){
        alert('success','new features added!');
       features_s_form.elements['feature_name'].value='';
        get_features();
    }
    else{
        alert('error','sever Down');
    }
    };
    xhr.send(data);
}
function get_features()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/features_facilities.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    
    xhr.onload=function(){
    document.getElementById('features-data').innerHTML =this.responseText; 
    }

    xhr.send('get_features');
}
function rem_feature(val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/features_facilities.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    
    xhr.onload=function(){
        if(this.responseText==1){
            alert('success','Feature remove');
            get_features();
        }
        else if(this.responseText=='room_added')
        {
            alert('error','features is added in room');
        }
        else
        {
            alert('error','Sever down');
        }
    }
    xhr.send('rem_feature='+val);
}       

facilities_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_facility();
});
function add_facility()
{
    let data = new FormData();
    data.append('name', facilities_s_form.elements['facilities_name'].value);
    data.append('icon', facilities_s_form.elements['facilities_icon'].files[0]);
    data.append('desc', facilities_s_form.elements['facilities_desc'].value);
    data.append('add_facility','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true);

    xhr.onload = function() {
        var myModal = document.getElementById('facilities-s')
        var modal = bootstrap.Modal.getInstance(myModal)
        modal.hide();
        if(this.responseText =='inv_img'){
            alert('error',"only PNG and PNG");
        }
        else if(this.responseText =='inv_size'){
            alert('error','Image less than 2 MB');
        }
        else if(this.responseText =='upd_failed'){
            alert('error','sever Down');
        }
        else{
            alert('success','new facilities added!');
            facilities_s_form.reset();
            get_facilities();
        }
    };
    xhr.send(data);
}
function get_facilities()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/features_facilities.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    
    xhr.onload=function(){
    document.getElementById('facilities-data').innerHTML =this.responseText; 
    }

    xhr.send('get_facilities');
}
function rem_facility(val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/features_facilities.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    
    xhr.onload=function(){
        if(this.responseText==1){
            alert('success','Facilities remove');
            get_facilities();
        }
        else if(this.responseText=='room_added')
        {
            alert('error','facilities is added in room');
        }
        else
        {
            alert('error','Sever down');
        }
    }
    xhr.send('rem_facility='+val);
}       

window.onload =function(){
    get_features();
    get_facilities();
}