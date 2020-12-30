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

    /** @test */

    public function collection_is_instance_of_iterator_aggregate(){
        $collection = new \App\Support\Collection();
        $this->assertInstanceOf(\IteratorAggregate::class,$collection);
    }

    /** @test */

    public function collection_can_be_iterated(){
        $collection = new \App\Support\Collection([
            'One','Two','Three'
        ]);

        $items = [];

        foreach($collection as $item){
            $items[] = $item;
        }

        $this->assertCount(3,$items);
        $this->assertInstanceOf(\ArrayIterator::class,$collection->getIterator());

    }

    /** @test */

    public function collection_can_be_merged_with_another_collection(){
        $collection1 = new \App\Support\Collection([
            'One','Two','Three'
        ]);
        $collection2 = new \App\Support\Collection([
            'Four','Five','Six'
        ]);

        $collection1->merge($collection2);

        $this->assertCount(6,$collection1->get());
        $this->assertEquals(6,$collection1->count());
    }
    /** @test */

    public function can_add_to_existing_collection(){
        $collection = new \App\Support\Collection([
            'One','Two','Three'
        ]);

        $collection->add(['three']);

        $this->assertEquals(4,$collection->count());
        $this->assertCount(4,$collection->get());
    }

    /** @test */

    public function return_json_encoded_items(){
        $collection = new \App\Support\Collection([
            ["fname"=>"M. Nabeel Mehmood"],
            ["lname"=>"Tahir Mehmood"]
        ]);

        $this->assertEquals('[{"fname":"M. Nabeel Mehmood"},{"lname":"Tahir Mehmood"}]',$collection->toJson());
        $this->assertIsString($collection->toJson());
    }


    /** @test */

    public function json_encoding_a_collection_object_returns_json(){
        $collection = new \App\Support\Collection([
            ["fname"=>"M. Nabeel Mehmood"],
            ["lname"=>"Tahir Mehmood"]
        ]);

        $encoded = json_encode($collection);
        $this->assertEquals('[{"fname":"M. Nabeel Mehmood"},{"lname":"Tahir Mehmood"}]',$encoded);
        $this->assertIsString($encoded);
    }


}