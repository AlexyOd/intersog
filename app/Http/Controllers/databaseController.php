<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class databaseController extends Controller
{
    public function getAllInfo()
    {
        $userCard =  array (
            'media' =>
                array (
                    0 =>
                        array (
                            'author_username' => 'whitneylichfield',
                            'link' => 'https://www.instagram.com/p/Bft3X32FPnw',
                            'likes_number' => '173',
                            'comments_number' => '9',
                            'id' => 553041,
                            'pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/90bfdfeef8852d02c79799699ffaf0d5/5C84E151/t51.2885-15/e35/41894979_722228031456644_6125706636452429824_n.jpg?se=7&ig_cache_key=MTg3NjQ1NTQ0MTM1MTY2MDE3NA%3D%3D.2',
                            'author_pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/2d5d547a1a5efc7160a77ee45cbc0836/5C7EC126/t51.2885-19/s150x150/25010491_745588952304475_5100777880275648512_n.jpg',
                            'caption' => 'I haven’t stuck to very many of my New Years resolutions... or any ever, but this year I started BBG by @kayla_itsines and I have to say I love it and have been having so much fun spending a little time on me every morning || Here’s to sticking to my resolutions this year 🥂 || and plus I have the cutest little workout buddies',
                            'social_network' => 'Instagram',
                        ),
                    1 =>
                        array (
                            'author_username' => 'mama.jaeger',
                            'link' => 'https://www.instagram.com/p/BfttbGCgzzj',
                            'likes_number' => '262',
                            'comments_number' => '5',
                            'id' => 554346,
                            'pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/90bfdfeef8852d02c79799699ffaf0d5/5C84E151/t51.2885-15/e35/41894979_722228031456644_6125706636452429824_n.jpg?se=7&ig_cache_key=MTg3NjQ1NTQ0MTM1MTY2MDE3NA%3D%3D.2',
                            'author_pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/2d5d547a1a5efc7160a77ee45cbc0836/5C7EC126/t51.2885-19/s150x150/25010491_745588952304475_5100777880275648512_n.jpg',
                            'caption' => 'Vacation has basically looked like him only letting me wear my sunglasses upside down and learning he is starting to be really afraid of bugs 🤷🏼‍♀️😎🐜',
                            'social_network' => 'Instagram',
                        ),
                    2 =>
                        array (
                            'author_username' => 'binkiesandbaubles',
                            'link' => 'https://www.instagram.com/p/Bftj_hknK6-',
                            'likes_number' => '316',
                            'comments_number' => '9',
                            'id' => 553067,
                            'pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/90bfdfeef8852d02c79799699ffaf0d5/5C84E151/t51.2885-15/e35/41894979_722228031456644_6125706636452429824_n.jpg?se=7&ig_cache_key=MTg3NjQ1NTQ0MTM1MTY2MDE3NA%3D%3D.2',
                            'author_pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/2d5d547a1a5efc7160a77ee45cbc0836/5C7EC126/t51.2885-19/s150x150/25010491_745588952304475_5100777880275648512_n.jpg',
                            'caption' => 'Hurt my back yesterday... putting on my sports bra 😆 feeling a little old. Had to skip the gym today and doing some Netflix and chill with the girls. This sweatshirt and the home decor is ALL on SALE // http://liketk.it/2uNKx #liketkit @liketoknow.it .
.
Shop my daily looks by following me on the LIKEtoKNOW.it app
.
.
.
.
.
.
 #LTKunder50 #LTKsalealert #LTKhome #fashionmom #momootd #realmomstyle #everydaystyle #realoutfitgram  #busymom #fashiononabudget #momuniform  #affordablefashion  #wintertrends #winterfashion #casualchic #persuepretty  #momsrule #momsarethebest  #styledbyme #outfitgram #legitmomstyle #fashionadvice #fashionbombdaily #coloradomom #goodnightmacaroon #targethome',
                            'social_network' => 'Instagram',
                        ),
                    3 =>
                        array (
                            'author_username' => 'ester.fomenko',
                            'link' => 'https://www.instagram.com/p/BftfyLLFflk',
                            'likes_number' => '467',
                            'comments_number' => '15',
                            'id' => 553354,
                            'pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/90bfdfeef8852d02c79799699ffaf0d5/5C84E151/t51.2885-15/e35/41894979_722228031456644_6125706636452429824_n.jpg?se=7&ig_cache_key=MTg3NjQ1NTQ0MTM1MTY2MDE3NA%3D%3D.2',
                            'author_pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/2d5d547a1a5efc7160a77ee45cbc0836/5C7EC126/t51.2885-19/s150x150/25010491_745588952304475_5100777880275648512_n.jpg',
                            'caption' => 'Last day in Miami! And today Aria LOVED the beach! There’s still hope her surfing career😂 Had an amazing time with my humans💛',
                            'social_network' => 'Instagram',
                        ),
                    4 =>
                        array (
                            'author_username' => 'Torunn Stuen',
                            'link' => 'https://www.youtube.com/watch?v=AKI21-jDK3M',
                            'likes_number' => '0',
                            'comments_number' => '0',
                            'id' => 548224,
                            'pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/90bfdfeef8852d02c79799699ffaf0d5/5C84E151/t51.2885-15/e35/41894979_722228031456644_6125706636452429824_n.jpg?se=7&ig_cache_key=MTg3NjQ1NTQ0MTM1MTY2MDE3NA%3D%3D.2',
                            'author_pic' => 'https://instagram.fiev5-1.fna.fbcdn.net/vp/2d5d547a1a5efc7160a77ee45cbc0836/5C7EC126/t51.2885-19/s150x150/25010491_745588952304475_5100777880275648512_n.jpg',
                            'caption' => 'So excited to announce my collection with Red Dress! You can shop all my picks here: https://www.reddressboutique.com/collections/torunn-lee 
Full blog posts of the outfits features on www.beyoutifulblog.com',
                            'social_network' => 'Youtube',
                        ),
                ),
            'count' => 5,
        );
        return response()->json($userCard);
    }
}
