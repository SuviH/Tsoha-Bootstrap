$(document).ready(function(){
  
  $(".poistaAinesosa").click(function(){
      $(this).parent().parent().remove();
  });
  $(".lisaaAinesosa").click(function(){
     var mainDiv = document.createElement("div");
     var firstDiv = document.createElement("div");
     firstDiv.className = "form-group col-md-4";
     var firstLabel = document.createElement("label");
     firstLabel.appendChild(document.createTextNode("Määrä"));
     var firstInput = document.createElement("input");
     firstInput.className ="form-control";
     firstInput.type = "text";
     firstInput.name = "maara[]"
     var secondDiv = document.createElement("div");
     var secondLabel = document.createElement("label");
     secondLabel.appendChild(document.createTextNode("Ainesosa"));
     var secondInput = document.createElement("input");
     secondInput.className ="form-control";
     secondInput.type = "text";
     secondInput.name = "ainesosa[]"
     secondDiv.className = "form-group col-md-6";
     var br = document.createElement("br");
     var thirdDiv = document.createElement("div");
     thirdDiv.className = "form-group col-md-2";
     var poistaAinesosa = document.createElement("button");
     poistaAinesosa.appendChild(document.createTextNode("Poista ainesosa"));
     poistaAinesosa.className = "btn btn-primary poistaAinesosa";
     poistaAinesosa.type ="button";
     thirdDiv.appendChild(br);
     thirdDiv.appendChild(poistaAinesosa);
     firstDiv.appendChild(firstLabel);
     firstDiv.appendChild(firstInput);
     secondDiv.appendChild(secondLabel);
     secondDiv.appendChild(secondInput);
     mainDiv.appendChild(firstDiv);
     mainDiv.appendChild(secondDiv);
     mainDiv.appendChild(thirdDiv);
     $("#ainesosat").append(mainDiv);
     
    $(poistaAinesosa).click(function(){
      $(this).parent().parent().remove();
     });
  });
});
