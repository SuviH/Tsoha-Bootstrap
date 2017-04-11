$(document).ready(function(){
  
  $(".poistaAinesosa").click(function(){
      $(this).parent().parent().remove();
  });
  $(".lisaaAinesosa").click(function(){
     var mainDiv = document.createElement("div");
    
     mainDiv.className = "form-horinzontal";
     var firstDiv = document.createElement("div");
     firstDiv.className = "form-group col-md-4";
     var firstLabel = document.createElement("label");
     firstLabel.appendChild(document.createTextNode("Määrä"));
     var firstInput = document.createElement("input")
     firstInput.className ="form-control";
     firstInput.type = "text";
     var secondDiv = document.createElement("div");
     var secondLabel = document.createElement("label");
     secondLabel.appendChild(document.createTextNode("Ainesosa"));
     var secondInput = document.createElement("input");
     secondInput.className ="form-control";
     secondInput.type = "text";
     secondDiv.className = "form-group col-md-6";
   
     var br = document.createElement("br");
     var thirdDiv = document.createElement("div");
     thirdDiv.className = "form-group";
     var poistaAinesosa = document.createElement("button");
     poistaAinesosa.appendChild(document.createTextNode("Poista ainesosa"));
     poistaAinesosa.className = "btn btn-primary poistaAinesosa";
     poistaAinesosa.type ="button";
    
     thirdDiv.appendChild(poistaAinesosa);
     firstDiv.appendChild(firstLabel);
     firstDiv.appendChild(firstInput);
     secondDiv.appendChild(secondLabel);
     secondDiv.appendChild(secondInput);
     mainDiv.appendChild(firstDiv);
     mainDiv.appendChild(secondDiv);
     mainDiv.appendChild(br);
     mainDiv.appendChild(thirdDiv);
     poistaAinesosa.click(function(){
      $(this).parent().parent().remove();
     });
     $("#ainesosat").append(mainDiv);
  });
});
