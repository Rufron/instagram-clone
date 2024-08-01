<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $url = $this->getUrl('post');
        $mime = $this->getMime($url);

        return [
            'url'=>$url,
            'mime'=>$mime,
            'mediable_id'=>Post::factory(),
            'mediable_type'=>function(array $attributes){

                return Post::find($attributes['mediable_id'])->getMorphClass();
            }

            ];
    }


    function getUrl($type= 'post'):string {
        switch ($type)  {
            case 'post':

                $urls = [
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/VolkswagenGTIReview.mp4",
                    "https://images.unsplash.com/photo-1721984209453-858624b7711e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHw5fHx8ZW58MHx8fHx8",
                    "https://images.unsplash.com/photo-1722203098808-f01da4d381cf?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwxM3x8fGVufDB8fHx8fA%3D%3D"
                ];

                return $this->faker->randomElement( array: $urls);
                break;

            case 'reels':

                $urls = [
                    "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4",
                    "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4"
                ];

                return $this->faker->randomElement( array: $urls);
                break;
            default:
                // code....
                break;
        }
    }

    function getMime($url) {
        // using current data only

        if (str()->contains( needles: $url, ignoreCase: 'gtv-videos-bucket')) {

            return 'video';
        } else if (str()->contains( needles: $url, ignoreCase: 'images.unsplash.com')) {

            return 'image';
        }


    }

    #chainable method.
    function reel() : Factory {
        $url = $this->getUrl( type: 'reel');
        $mime = $this->getMime( url: $url);

        return $this->state(state: function(array $attributes) use($url, $mime) {
            return [
                'mime'=>$mime,
                'url'=>$url,
            ];
        });
    }


       #chainable method.
       function post() : Factory {
        $url = $this->getUrl( type: 'post');
        $mime = $this->getMime( url: $url);

        return $this->state(state: function(array $attributes) use($url, $mime) {
            return [
                'mime'=>$mime,
                'url'=>$url,
            ];
        });
    }
}
