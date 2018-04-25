<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Postcode
{
  public static function format($postcode)
  {
    $remove = strtoupper(str_replace(" ","",$postcode));
    return $remove;
  }

  public static function is_valid($postcode)
  {
    if(Postcode::format($postcode))
    {
      return true;
    }else{
      return false;
    }
    // $remove = strtoupper(str_replace(" ","",$postcode));
    // return $remove;
  }
}

class PostcodeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_format_all_postcodes_in_a_uniform_way()
    {
        $this->assertEquals("9468AB", Postcode::format("9468 AB"));
        $this->assertEquals("9468AB", Postcode::format("9468 ab"));
        $this->assertEquals("9468AB", Postcode::format("   9468   AT  "));
    }

    public function test_if_a_postcode_is_a_valid_dutch_postcode()
    {
      $this->assertTrue(Postcode::is_valid("9468 BS"));
      $this->assertFalse(Postcode::is_valid("BS 9468"));
      $this->assertFalse(Postcode::is_valid("94688 BS"));
      $this->assertFalse(Postcode::is_valid("9468 BSA"));
      $this->assertFalse(Postcode::is_valid(" 9468 BS"));
    }

    public function test_exception_should_be_raise_when_using_invalid_postcode()
    {
      $this->assertTrue(Postcode::format_and_validate("9468 BS"));
      $this->assertFalse(Postcode::is_valid("BS 9468"));
      $this->assertFalse(Postcode::is_valid("94688 BS"));
      $this->assertFalse(Postcode::is_valid("9468 BSA"));
      $this->assertFalse(Postcode::is_valid(" 9468 BS"));
    }


}
