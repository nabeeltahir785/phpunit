<?php


namespace unit;
use PHPUnit\Framework\TestCase;

class CollectionTest extends  TestCase
{

    /** @test */

    public function empty_instantiated_collection_returns_no_items(){
        $collection = new \App\Support\Collection([]);

        $this->assertEmpty($collection->get());
    }

    /** @test */

    public function count_is_correct_for_items_passed_in(){
        $collection = new \App\Support\Collection([
                'One','Two','Three'
        ]);

        $this->assertEquals(3,$collection->count());
    }

    /** @test */

    public function items_returned_match_items_passed_in(){
        $collection = new \App\Support\Collection([
            'One','Two','Three'
        ]);
        $this->assertCount(3,$collection->get());

        $this->assertEquals('One',$collection->get()[0]);
        $this->assertEquals('Two',$collection->get()[1]);
        $this->assertEquals('Three',$collection->get()[2]);
    }

}