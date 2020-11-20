"use strict"

window.addEventListener('load', function(){

    var button = document.getElementById('lookup');
    button.addEventListener('click', lookUpCountry)

});

async function lookUpCountry(){
    var resultDiv = document.getElementById('result')
    var searchData = document.getElementById('country').value
    // console.log(document.getElementById('country').value)
    var results = await fetchCountryData(searchData)
    console.log(results)
    resultDiv.innerHTML = results;
}

async function fetchCountryData(input){

    var countryInfo = await fetch(`world.php?country=${input}`)
    return countryInfo.text()
}
