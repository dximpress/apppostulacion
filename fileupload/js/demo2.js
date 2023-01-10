/*
 * jQuery File Upload Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $ */
/*
|hlp|hqx|hta|htc|htm|html|htt|hxt|ico|ics|ief|iii|inf|ins|isp|IVF|jar|java|jck|jcz|jfif|jpb|jpe|jpeg|jpg|js|json|jsonld|jsx|latex|less|lit|lpk|lsf|lsx|lzh|m13|m14|m1v|m2ts|m3u|m4a|m4v|man|manifest|map|mdb|mdp|me|mht|mhtml|mid|midi|mix|mmf|mno|mny|mov|movie|mp2|mp3|mp4|mp4v|mpa|mpe|mpeg|mpg|mpp|mpv2|ms|msi|mso|mvb|mvc|nc|nsc|nws|ocx|oda|odc|ods|oga|ogg|ogv|one|onea|onepkg|onetmp|onetoc|onetoc2|osdx|otf|p10|p12|p7b|p7c|p7m|p7r|p7s|pbm|pcx|pcz|pdf|pfb|pfm|pfx|pgm|pko|pma|pmc|pml|pmr|pmw|png|pnm|pnz|pot|potm|potx|ppam|ppm|pps|ppsm|ppsx|ppt|pptm|pptx|prf|prm|prx|ps|psd|psm|psp|pub|qt|qtl|qxd|ra|ram|rar|ras|rf|rgb|rm|rmi|roff|rpm|rtf|rtx|scd|sct|sea|setpay|setreg|sgml|sh|shar|sit|sldm|sldx|smd|smi|smx|smz|snd|snp|spc|spl|spx|src|ssm|sst|stl|sv4cpio|sv4crc|svg|svgz|swf|t|tar|tcl|tex|texi|texinfo|tgz|thmx|thn|tif|tiff|toc|tr|trm|ts|tsv|ttf|tts|txt|u32|uls|ustar|vbs|vcf|vcs|vdx|vml|vsd|vss|vst|vsto|vsw|vsx|vtx|wav|wax|wbmp|wcm|wdb|webm|wks|wm|wma|wmd|wmf|wml|wmlc|wmls|wmlsc|wmp|wmv|wmx|wmz|woff|woff2|wps|wri|wrl|wrz|wsdl|wtv|wvx|x|xaf|xaml|xap|xbap|xbm|xdr|xht|xhtml|xla|xlam|xlc|xlm|xls|xlsb|xlsm|xlsx|xlt|xltm|xltx|xlw|xml|xof|xpm|xps|xsd|xsf|xsl|xslt|xsn|xtp|xwd|z|zip

*/

$(function () {
  'use strict';

  $('.fileupload').each(function () {
    $(this).fileupload({
      autoUpload: true,
      url: 'fileupload/server/php/',
      dropZone: $(this),
      disableValidation: false,
      maxFileSize: 3000000, // 10000000 => 10 MB
      acceptFileTypes: /^image\/(gif|jpe?g|png)|(mp4|pdf)$/i //|doc|docx
    }).bind('fileuploaddone', function (e, data) {
      $(this).find('.archivos').val('1');
    });

  });

  //Input Radios
  $('.opdradio').click(function(){
    $(this).closest('.radio-list').find('.archivos').val('1');
  });

});

function valida(e){
  tecla = (document.all) ? e.keyCode : e.which;
  //Tecla de retroceso para borrar, siempre la permite
  if (tecla==8){
    return true;
  }
  // Patron de entrada, en este caso solo acepta numeros
  patron =/[0-9. ]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}
