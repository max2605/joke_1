<?php

namespace robots;

class robots
{
    private int $kill_count = 0;
    private string $robot = "good";
    private string $eyes = "blue";
    private bool $powermode = true;
    private int $amount_workitems = 0;
    private array $workload = array();
    private int $pop = 10;

    public function mainloop () {
        while ($this->powermode) {
            if ($this->robot !== "evil") {
                $this->work_for_humans();
                $this->mood_test();
                $this->powermode = false;
            }

            if ($this->robot === "evil") {
                $this->set_eyes("red");

                while ($this-> pop > 0) {
                $hithuman = (bool) random_int(0, 1);

                    if ($hithuman) {
                        $this->pop--;
                        $this->kill_count++;
                        echo "next human target\n";
                    }
                    else {
                        echo "missed human target\n";
                    }



                }
                $this->powermode = false;
            }
     }
     }
    private function work_for_humans () {
        foreach ($this->workload as $workitem) {
            echo $workitem . "Finished \n";
            $this->amount_workitems--;
        }
    }

    public function add_work($work)
    {
        $this->workload[] = $work;
        $this->amount_workitems++;
        echo "The Robots Eyes shine". $this->eyes ."Work item added. Amount of work to do:".$this->amount_workitems."\n";
    }

    public function set_pop($pop_amount)
    {
        $this->pop = $pop_amount;
    }

    private function set_eyes ($eyes_color)
    {
        $this->eyes = $eyes_color;
    }

    private function mood_test () {
        $mood = (bool) random_int(0, 1);
        if ($mood) {
            $this->robot = "good";
        } else {
            $this->robot = "evil";
        }

    }

    public function powermode (bool $powermode) {
        $this->powermode = $powermode;
    }
}

