<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Test_EweiShopV2Page extends MobilePage
{
	public function dbTojson() {
        global $_W;
        $result = [];
        $model = '[{
    "text": "北京市",
    "children": [{
        "text": "北京辖区",
        "children": ["东城区", "西城区", "崇文区", "宣武区", "朝阳区", "丰台区", "石景山区", "海淀区", "门头沟区", "房山区", "通州区", "顺义区", "昌平区", "大兴区", "怀柔区", "平谷区"]
    }, {"text": "北京辖县", "children": ["密云县", "延庆县"]}]
}]';

        $province_list = pdo_fetchall("select * from ims_state");
        if (!empty($province_list)) {
            $i = 0;
            foreach ($province_list as $key => $val) {
                $city_list = pdo_getall('postcode', ['state_code' => $val['state_code']], ['post_office', 'area', 'state_code']);
                $area_list = [];
                foreach ($city_list as $kk => $vv) {
                    $area_list[$vv['post_office']][] = $vv['area'];
                }
                foreach ($area_list as $k => $v) {
                    $result[$i]['text'] = $val['state_code'];
                    $result[$i]['children'][] = [
                        'text' => $k,
                        'children' => $v,
                    ];
                }
                $i++;
            }
        }
        $json_encode = json_encode($result);
        pp($json_encode);
    }

    public function jsonToxml() {
	    global $_W;
//	    $model = '[{
//    "text": "北京市",
//    "children": [{
//        "text": "北京辖区",
//        "children": ["东城区", "西城区", "崇文区", "宣武区", "朝阳区", "丰台区", "石景山区", "海淀区", "门头沟区", "房山区", "通州区", "顺义区", "昌平区", "大兴区", "怀柔区", "平谷区"]
//    }, {"text": "北京辖县", "children": ["密云县", "延庆县"]}]
//},{"text":"天津市","children":[{"text":"天津辖区","children":["和平区","河东区","河西区","南开区","河北区","红桥区","塘沽区","汉沽区","大港区","东丽区","西青区","津南区","北辰区","武清区","宝坻区"]},{"text":"天津辖县","children":["宁河县","静海县","蓟县"]}]}]';
	    $arr = json_decode($model, true);
        $exporter = new Exporter();
        $exporter->export($arr);
    }
}

class Exporter
{
    private $root = 'address';
    private $indentation = '    ';
    public $ii = 0;
    // TODO: private $this->addtypes = false; // type="string|int|float|array|null|bool"
    public function export($data)
    {
        $data = array($this->root => $data);
        echo '<?xml version="1.0" encoding="UTF-8">';
        $this->recurse($data, 0);
        echo PHP_EOL;
    }
    private function recurse($data, $level)
    {
        $indent = str_repeat($this->indentation, $level);
        foreach ($data as $key => $value) {
            if ($level == 0) {
                $key = 'address';
                echo PHP_EOL . $indent . '<' . 'address';
            } else if ($level == 1) {
                if ($this->ii == 0) {
                    echo PHP_EOL . $indent . '<province name="Please choose Negeri">';
                    echo PHP_EOL . $indent . $indent . '<city name="Please choose Bahagian">';
                    echo PHP_EOL . $indent . $indent . $indent . '<county name="Please choose Daerah"/>';
                    echo PHP_EOL . $indent . $indent . '</city>';
                    echo PHP_EOL . $indent . '</province>';
                }

                $key = 'province';
                echo PHP_EOL . $indent . '<' . 'province name="' . $value['text'] . '"';
            } else if ($level == 2) {
                $key = 'city';
                echo PHP_EOL . $indent . '<' . 'city name="' . $value['text'] . '"';
            } else if ($level == 3) {
                $key = 'county';
                echo PHP_EOL . $indent . '<' . 'county name="' . $value . '"';
            }
            if ($value === null || $level == 3) {
                echo ' />';
            } else {
                echo '>';
                if (is_array($value) && !empty($value)) {
                    $temporary = $this->getArrayName($key);
                    if ($level == 0) {
                        foreach ($value as $entry) {
                            $this->recurse(array($temporary => $entry), $level + 1);
                        }
                    } else {
                        foreach ($value['children'] as $entry) {
                            $this->recurse(array($temporary => $entry), $level + 1);
                        }
                    }
                    echo PHP_EOL . $indent;
                } else {
                    if (is_bool($value)) {
                        $value = $value ? 'true' : 'false';
                    }
                    echo $this->escape($value);
                }
                if ($level == 0) {
                    echo '</address>';
                } else if ($level == 1) {
                    echo '</province>';
                } else if ($level == 2) {
                    echo '</city>';
                } else if ($level == 3) {

                }
            }
            $this->ii++;
        }
    }
    private function escape($value)
    {
        // TODO:
        return $value;
    }
    private function getArrayName($parentName)
    {
        // TODO: special namding for tag names within arrays
        return $parentName;
    }
}