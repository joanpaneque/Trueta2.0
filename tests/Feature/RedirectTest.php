<?php
use App\Models\User;
use App\Models\Surgery;
use App\Models\SurgeryType;


describe('Guest redirects to login', function () {
    test('surgeries', function () {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
    });
    test('surgeries.edit', function () {
        $response = $this->get(route('surgeries.edit', 1));
        $response->assertRedirect(route('login'));
    });
    test('surgeries.types', function () {
        $response = $this->get(route('surgeries.types.index', [1, 1]));
        $response->assertRedirect(route('login'));
    });
    test('surgeries.types.edit', function () {
        $response = $this->get(route('surgeries.types.edit', [1, 1]));
        $response->assertRedirect(route('login'));
    });
    test('surgeries.types.flags', function () {
        $response = $this->get(route('surgeries.types.flags.index', [1, 1]));
        $response->assertRedirect(route('login'));
    });
    test('surgeries.types.flags.edit', function () {
        $response = $this->get(route('surgeries.types.flags.edit', [1, 1, 1]));
        $response->assertRedirect(route('login'));
    });
    test('surgeries.types.results', function () {
        $response = $this->get(route('surgeries.types.results.index', [1, 1]));
        $response->assertRedirect(route('login'));
    });
});

// describe('User registered', function () {
//     test('surgeries', function () {
//         $user = User::factory()->create();
//         $response = $this->actingAs($user)->get(route('dashboard'));
//         $response->assertOk();
//     });
//     test('surgeries.edit', function () {
//         $user = User::factory()->create();
//         $response = $this->actingAs($user)->get(route('surgeries.edit', 1));
//         $response->assertRedirect(route('dashboard'));
//     });
//     // test('surgeries.types', function () {
//     //     $user = User::factory()->create();
//     //     dd(SurgeryType::all()->toArray());
//     //     $response = $this->actingAs($user)->get('/surgeries/1/types');
//     //     $response->assertOk();
//     // });
// });