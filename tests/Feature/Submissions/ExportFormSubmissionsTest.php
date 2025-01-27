<?php

use App\Models\Form;
use App\Models\FormBlock;
use App\Models\FormSession;
use App\Enums\FormBlockType;
use App\Models\FormSessionResponse;
use App\Models\FormBlockInteraction;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can_download_an_export_of_form_results', function () {
    $form = Form::factory()->create(['name' => 'Test Form']);

    $blockA = FormBlock::factory()
        ->for($form)
        ->has(FormBlockInteraction::factory()->input())
        ->create(['type' => FormBlockType::short]);

    $blockB = FormBlock::factory()->for($form)
        ->has(FormBlockInteraction::factory()->button()->count(4))
        ->create(['type' => FormBlockType::radio]);

    $session = FormSession::factory()
        ->for($form)->completed()->create();

    FormSessionResponse::factory()
        ->for($session)
        ->for($blockA->interactions[0])
        ->create([
            'value' => 'foo',
        ]);

    FormSessionResponse::factory()
        ->for($session)
        ->for($blockB->interactions[0])
        ->create([
            'value' => $blockB->interactions[0]->label,
        ]);

    $response = $this->actingAs($form->user)
        ->json('GET', route('forms.submissions-export', $form))
        ->assertOk();

    $response->assertDownload('test-form.results.csv');
});
