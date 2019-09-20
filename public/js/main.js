function searchFunction() {
    // декларираме променливите които ще използваме надолу
    var input, filter, ul, li, a, i, txtValue;
    // вземаме инпут полето чрез ID
    input = document.getElementById("searchInput");
    // тук вземаме стойноста на инпут полето и й я правим с големи букви
    filter = input.value.toUpperCase();
    // тук  взимаме <ul> тага чрез ID
    ul = document.getElementById("CountryList");
    
     // тук  взимаме <li> тага чрез TagName от ul променливата която съдържа ul taga 
    li = ul.getElementsByTagName("li");
    
    // итерираме през li дължината 
    for (i = 0; i < li.length; i++) {
        
        // при всяка итерация задаваме стоймост на а която е равна на <a> тага в съответния масив li[?]
  
        // тук задаваме на txtValue текста койпто е в горния <a>textValue</a> tag
        txtValue =  li[i].textContent ||  li[i].innerText;
        console.log(txtValue);
        // Tук проверяваме дали стойността на инпута "Filter" се съдържа в "TextValue"
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
       // тук след проверката задаваме дисплей стил на "li" за да е видим ако инпут текста е открит
            li[i].style.display = "flex";
       // ако не е открито съвпадение скриваме листа      
        } else {
        
            li[i].style.display = "none";
        }
    }
}