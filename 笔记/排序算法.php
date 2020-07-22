<?php
    // 选择排序
    // 首先，找到数组中最小的那个元素，其次，将它和数组的第一个元素交换位置(如果第一个元素就是最小元素那么它就和自己交换)。其次，在剩下的元素中找到最小的元素，将它与数组的第二个元素交换位置。如此往复，直到将整个数组排序。这种方法我们称之为选择排序。
    // 1、时间复杂度：O(n2) 2、空间复杂度：O(1)
    function selection_sort ($data) {
        $length = count($data);
        for ($i=0; $i < $length; $i++) { 
            $min = $i;
            for ($y = $i+1; $y < $length; $y++) { 
                if($data[$y] < $data[$min]) {
                    $min = $y;
                }
            }
            $middle = $data[$i];
            $data[$i] = $data[$min];
            $data[$min] = $middle;
        }
        return $data;
    }
    // 插入排序
    // 1、从数组第2个元素开始抽取元素。
    // 2、把它与左边第一个元素比较，如果左边第一个元素比它大，则继续与左边第二个元素比较下去，直到遇到不比它大的元素，然后插到这个元素的右边。
    // 3、继续选取第3，4，….n个元素,重复步骤 2 ，选择适当的位置插入。
    // 1、时间复杂度：O(n2) 2、空间复杂度：O(1)
    function insertion_sort ($data) {
        $length = count($data);
        for ($i=1; $i < $length; $i++) {
            for ($y=$i -1; $y >= 0; $y--) { 
                if ($data[$i] > $data[$y]) {
                    $middle = $data[$i]; //9
                    for ($j=$i; $j > $y; $j--) {
                        $data[$j] = $data[$j-1];
                    }
                    $data[$y+1] = $middle;
                    break;
                }

                if ($y == 0) {
                    $middle = $data[$i]; //9
                    for ($j=$i; $j > $y; $j--) {
                        $data[$j] = $data[$j-1];
                    }
                    $data[$y] = $middle;
                    break;
                }
            }
        }
        return $data;
    }

    // 冒泡排序
    // 1、把第一个元素与第二个元素比较，如果第一个比第二个大，则交换他们的位置。接着继续比较第二个与第三个元素，如果第二个比第三个大，则交换他们的位置….
    // 1、时间复杂度：O(n2) 2、空间复杂度：O(1)
    function bubble_sort ($data) {
        $length = count($data);
        for ($i=0; $i < $length; $i++) {
            $status = true;
            for ($y=0; $y < $length - $i - 1 ; $y++) { 
                if ($data[$y] > $data[$y + 1]) {
                    $status = false;
                    $middle = $data[$y];
                    $data[$y] = $data[$y + 1];
                    $data[$y + 1] = $middle;
                }
            }
            if ($status) {
                break;
            }
        }
        return $data;
    }

    //希尔排序
    // 是采用插入排序的方法，先让数组中任意间隔为 h 的元素有序，刚开始 h 的大小可以是 h = n / 2,接着让 h = n / 4，让 h 一直缩小，当 h = 1 时，也就是此时数组中任意间隔为1的元素有序，此时的数组就是有序的了。
    function  shell_sort () {
        $length = count($data);
        for ($i=1; $i < $length; $i++) {
            for ($y=$i -1; $y >= 0; $y--) { 
                if ($data[$i] > $data[$y]) {
                    $middle = $data[$i]; //9
                    for ($j=$i; $j > $y; $j--) {
                        $data[$j] = $data[$j-1];
                    }
                    $data[$y+1] = $middle;
                    break;
                }

                if ($y == 0) {
                    $middle = $data[$i]; //9
                    for ($j=$i; $j > $y; $j--) {
                        $data[$j] = $data[$j-1];
                    }
                    $data[$y] = $middle;
                    break;
                }
            }
        }
        return $data;
    }