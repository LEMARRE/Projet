$( document ).ready(function() {

//===============================================================================
    // JS AD QUESTION ===============================================================*
    //==========================================================================

      //lorsque je clique sur le bouton ajouter une question
      $('#add-question').click(function(){
        //Récupère le numéro des futurs champs qui seront créés
        const index = $('#qcm_question div.form-group').length;//compte le nombre de div formgroup contenant les questions

        //Récupère le prototype des entrées
        const tmpl = $('#qcm_question').data('prototype').replace(/__name__/g, index);
        
        //injection du code dans la div
        $('#qcm_question').append(tmpl);

        //gestion du bouton de suppression
        HandleDeleteButtons();
       
      });

      //fonction de suppression des champs questions
      function HandleDeleteButtons(){
        $('button[data-action="deleteQ"]').click(function(){
          const target = this.dataset.target;
          $(target).remove();
        });
      };
         
      //==========================================================================
      // JS AD REPONSE ===========================================================
      //==========================================================================

      //lorsque je clique sur le bouton ajouter une REPONSE
        $('body').on( 'click', '.add-response', function(){
          btnRespId = $(this).attr("data-id");
          let qNumber = $(this).attr("data-number");

          console.log(btnRespId);
          
          //Récupère le numéro des futurs champs qui seront créés
          const index2 = $( '#' + btnRespId + '_choice .response-block').length;//compte le nombre de div adResp contenant les reponses
          console.log(index2);
          
          let name = btnRespId + '_choice_' + index2;
            
          let proto = $('.prototypeResponse').data('prototype');

          proto = proto.replace(/question___name__/g, 'question_'  + qNumber);
          proto = proto.replace(/\[question\]\[__name__\]/g, '[question]['  + qNumber + ']');
          proto = proto.replace(/__name__/g, index2);

          //injection du code dans la div
          $('#' + btnRespId +'_choice').append(proto); 
          HandleDeleteButtonsR();

          });

        //fonction de suppression des champs reponse
        
        function HandleDeleteButtonsR(){
          $('button[data-action="deleteR"]').click(function(){
            $(this).parents('.response-block').remove();
          });
          
        };
 
      });