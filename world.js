"use strict"

window.addEventListener('load', function(){

    var button = document.getElementById('lookup');
    var button2 = document.getElementById('cityLookup');
    button.addEventListener('click', lookUpCountry)
    button2.addEventListener('click', lookUpCity)

});

//function to lookup country
async function lookUpCountry(){
    var resultDiv = document.getElementById('result')
    var searchData = document.getElementById('country').value
    // console.log(document.getElementById('country').value)
    var results = await fetchCountryData(searchData)
    // console.log(results)
    resultDiv.innerHTML = results;
}

async function fetchCountryData(input){

    var countryInfo = await fetch(`world.php?country=${input}`)
    return countryInfo.text()
}


//function to lookup cities
async function lookUpCity(){
    var resultDiv = document.getElementById('result')
    var searchData = document.getElementById('country').value
    // console.log(document.getElementById('country').value)
    var results2 = await fetchCityData(searchData)
    // console.log(results2)
    resultDiv.innerHTML = results2;
}

async function fetchCityData(input){

    var cityInfo = await fetch("world.php"+"?country="+input+"&context=cities")
    return cityInfo.text()
}