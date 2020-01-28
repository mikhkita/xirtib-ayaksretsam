<? CJSCore::Init( 'jquery' ); ?>
<script>

    $(document).ready(function(){   
        function highlight(){
            var index = 0;
            $('tr.main-grid-row-head').find('th').each(function(i){
                var text = $(this).find('.main-grid-head-title').text();
                if (text == "Активность") {
                    index = i;
                    return false;
                }
            });

            $('.main-grid-table').find('.main-grid-row').each(function(){
                if ($(this).find('td').eq(index).find('span').text() == "Нет") {
                    $(this).addClass('no-active');
                }
            })
        }

        highlight();

        setInterval(function(){
            highlight();
        },100);

        if ($('#form_element_1_form').length) {

            $(document).on('change', '#form_element_1_form', function(){
                var color = $('#tr_PROPERTY_6').find('option:not(:first-child):selected').text().split('[')[0].trim().toLowerCase();
                var name = $('#form_element_1_layout').find('#NAME').val().trim().toLowerCase().replace(/\s/ig, '-');
                if (color.length) {
                    result = name + '-' + color;
                } else {
                    result = name;
                }

                $('#form_element_1_layout').find('#CODE').val(cyr2lat(result));
            });
        }

    })

    function cyr2lat(str) {
 
        var cyr2latChars = new Array(
            ['а', 'a'], ['б', 'b'], ['в', 'v'], ['г', 'g'],
            ['д', 'd'],  ['е', 'e'], ['ё', 'yo'], ['ж', 'zh'], ['з', 'z'],
            ['и', 'i'], ['й', 'y'], ['к', 'k'], ['л', 'l'],
            ['м', 'm'],  ['н', 'n'], ['о', 'o'], ['п', 'p'],  ['р', 'r'],
            ['с', 's'], ['т', 't'], ['у', 'u'], ['ф', 'f'],
            ['х', 'h'],  ['ц', 'c'], ['ч', 'ch'],['ш', 'sh'], ['щ', 'shch'],
            ['ъ', ''],  ['ы', 'y'], ['ь', ''],  ['э', 'e'], ['ю', 'yu'], ['я', 'ya'],
             
            ['А', 'A'], ['Б', 'B'],  ['В', 'V'], ['Г', 'G'],
            ['Д', 'D'], ['Е', 'E'], ['Ё', 'YO'],  ['Ж', 'ZH'], ['З', 'Z'],
            ['И', 'I'], ['Й', 'Y'],  ['К', 'K'], ['Л', 'L'],
            ['М', 'M'], ['Н', 'N'], ['О', 'O'],  ['П', 'P'],  ['Р', 'R'],
            ['С', 'S'], ['Т', 'T'],  ['У', 'U'], ['Ф', 'F'],
            ['Х', 'H'], ['Ц', 'C'], ['Ч', 'CH'], ['Ш', 'SH'], ['Щ', 'SHCH'],
            ['Ъ', ''],  ['Ы', 'Y'],
            ['Ь', ''],
            ['Э', 'E'],
            ['Ю', 'YU'],
            ['Я', 'YA'],
             
            ['a', 'a'], ['b', 'b'], ['c', 'c'], ['d', 'd'], ['e', 'e'],
            ['f', 'f'], ['g', 'g'], ['h', 'h'], ['i', 'i'], ['j', 'j'],
            ['k', 'k'], ['l', 'l'], ['m', 'm'], ['n', 'n'], ['o', 'o'],
            ['p', 'p'], ['q', 'q'], ['r', 'r'], ['s', 's'], ['t', 't'],
            ['u', 'u'], ['v', 'v'], ['w', 'w'], ['x', 'x'], ['y', 'y'],
            ['z', 'z'],
             
            ['A', 'A'], ['B', 'B'], ['C', 'C'], ['D', 'D'],['E', 'E'],
            ['F', 'F'],['G', 'G'],['H', 'H'],['I', 'I'],['J', 'J'],['K', 'K'],
            ['L', 'L'], ['M', 'M'], ['N', 'N'], ['O', 'O'],['P', 'P'],
            ['Q', 'Q'],['R', 'R'],['S', 'S'],['T', 'T'],['U', 'U'],['V', 'V'],
            ['W', 'W'], ['X', 'X'], ['Y', 'Y'], ['Z', 'Z'],
             
            [' ', '-'],['0', '0'],['1', '1'],['2', '2'],['3', '3'],
            ['4', '4'],['5', '5'],['6', '6'],['7', '7'],['8', '8'],['9', '9'],
            ['-', '-']
     
        );
     
        var newStr = new String();
     
        for (var i = 0; i < str.length; i++) {
     
            ch = str.charAt(i);
            var newCh = '';
     
            for (var j = 0; j < cyr2latChars.length; j++) {
                if (ch == cyr2latChars[j][0]) {
                    newCh = cyr2latChars[j][1];
                }
            }
            newStr += newCh;
     
        }
        return newStr.replace(/[-]{2,}/gim, '-').replace(/\n/gim, '');
    }

</script>
<style>
    /*.adm-info-message-wrap{
        display: none;
    }*/
    .no-active td{
        background-color: #e7e9ea;
    }
    .no-active:hover td{
        background-color: #dae0e2 !important;
    }
</style>