/*
 * --
 *  solodoff@ya.ru
 *  upd 18.07.2013
 * --
 *
 *  Проблемы:
 *    --иметь ввиду,что когда пустое поле не в фокусе,
 *    его значение не пустая строка, можно проверять, пустое ли поле, например так:
 *    $(...).hasClass('placeholder');
 *    При отправке формы тоже учитывать это.
 * 
 *
 * 
 *  Использование:
 *    <input type="text" placeholder="логин" autocomplete="off" />
 *    $('input[placeholder]').placeholder();
 *
 *  Особенности:
 *    Если значение поля меняется скриптом, то для корректной работы плейсхолдера
 *    после изменений нужно делать trigger('blur'), например:
 *    $input.val('').trigger('blur');
 * 
 *  CSS:
 *    ::-webkit-input-placeholder{}
 *    :-moz-placeholder{}
 *    .placeholder{}
 * 
 */
;(function ($, window, document, undefined){
  //var SUPPORT = !!('placeholder' in document.createElement('input'));
  
  $.fn.extend({
    placeholder: function(){
      //if(SUPPORT) return this;
      
      return this.each(function(){
        var $this = $(this);
        var placeholder_text = $this.attr('placeholder');
        $this.removeAttr('placeholder');

        var add = function(){
          $this
          .addClass('placeholder')
          .val(placeholder_text);
        };

        var remove = function(){
          $this
          .val('')
          .removeClass('placeholder');
        };

        $this
        .on('focus.placeholder', function(){
          if($this.hasClass('placeholder')){
            remove();
          }
        })
        .on('blur.placeholder', function(){
          if(!$this.val()){
            add();
          }
        })
        .data('placeholder', placeholder_text)
        .trigger('blur.placeholder');
      });
    }
  });
})(jQuery, window, document);