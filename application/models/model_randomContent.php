<?php
// сделано чисто по фану как заготовку для рекомендательной системы сайта

class Model_randomContent{


	public function get_data(){


        $array = array(
            '<li><a href="/ritualnyeuslugivmoskve">Ритуальные услуги в Москве</a></li>',
            '<li><a href="/stoimostritualnyhuslugvmoskve">Стоимость ритуальных услуг в Москве</a></li>',
            '<li><a href="/pohoronnyyritual">Похоронный ритуал</a></li>',
            '<li>Кодекс этики Европейской федерации похоронных услуг</li>',
            '<li>Смерть, похороны и поминки</li>',
            '<li>Похороны в ведической и христианской традиции</li>',
            '<li>Груз 200</li>',
        );


       $howMany = 3;
        $rand_keys = array_rand($array, $howMany);


        $HTML = '<ul>';
        for($i = 0; $i < count($rand_keys); ++$i) {
            $HTML = $HTML . $array[$rand_keys[$i]];
        }

        $HTML = $HTML . '</ul>';


        return  $HTML;

    }

}


?>

<html>

</html>


