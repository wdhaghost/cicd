<?php

namespace Tests\Feature;

use App\Models\Equipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EquipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_route(): void
    {
        $response = $this->get('/equipments');

        $response->assertStatus(200);
        $response->assertViewIs('equipments.index');
    }

    public function test_non_existent_route(): void
    {
        $response = $this->get('/equipmentszefezf');

        $response->assertStatus(404);
    }

    public function test_show_route(): void
    {
        $equipment = Equipment::factory()->create();

        $response = $this->get("/equipments/{$equipment->id}");

        $response->assertStatus(200);
        $response->assertViewIs('equipments.show');
    }

    public function test_show_non_existent_route(): void
    {
        $response = $this->get('/equipments/999');

        $response->assertRedirect('/equipments');
    }

    public function test_create_route(): void
    {
        $response = $this->get('/equipments/create');

        $response->assertStatus(200);
        $response->assertViewIs('equipments.create');
    }

    public function test_edit_route(): void
    {
        $equipment = Equipment::factory()->create();

        $response = $this->get("equipments/{$equipment->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('equipments.edit');
    }

    public function test_edit_non_existent_route(): void
    {
        $response = $this->get('/equipments/999/edit');

        $response->assertRedirect('/equipments');
    }

    public function test_store_route(): void
    {
        $equipmentData = [
            'name' => 'Souris',
            'description' => 'Marque Logitech',
            'quantity' => 5,
        ];

        $response = $this->post('/equipments', $equipmentData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('equipments', $equipmentData);
    }

    public function test_store_invalid_data_route(): void
    {
        $invalidEquipmentData = [
            'name' => 'Ab', // Invalid as it's shorter than 3 characters
            'description' => '', // Invalid as it's required
            'quantity' => 'invalid',
        ];

        $response = $this->post('/equipments', $invalidEquipmentData);

        $response->assertSessionHasErrors(['name', 'description', 'quantity']);
        $response->assertRedirect('/equipments/create');
    }

    public function test_update_route(): void
    {
        $equipment = Equipment::factory()->create();
        $updatedEquipmentData = [
            'name' => 'Clavier', // 
            'description' => 'zedezod edzeodpjze',
            'quantity' => 4,
        ];

        $response = $this->put("/equipments/{$equipment->id}", $updatedEquipmentData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('equipments', $updatedEquipmentData);
    }

    public function test_update_invalid_data_route(): void
    {
        $equipment = Equipment::factory()->create();
        $invalidUpdatedEquipmentData = [
            'name' => 'NewName',
            'descipstion' => 'Blabla',
            'quantity' => 'deux',
        ];

        $response = $this->put("/equipments/{$equipment->id}", $invalidUpdatedEquipmentData);

        $response->assertSessionHasErrors(['name', 'description', 'quantity']);
    }

    public function test_update_non_existing_equipment_route(): void
    {
        $nonExistingEquipmentId = 999;
        $updatedEquipmentData = [
            'name' => 'matériel',
            'description' => 'description',
            'quantity' => 2,
        ];

        $response = $this->put("/equipments/{$nonExistingEquipmentId}", $updatedEquipmentData);

        $response->assertStatus(404);
    }

    public function test_delete_route(): void
    {
        $equipment = Equipment::factory()->create();

        $response = $this->delete("/equipments/{$equipment->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('equipments', ['id' => $equipment->id]);
    }

    public function test_delete_non_existing_equipment_route(): void
    {
        $nonExistingEquipmentId = 999;

        $response = $this->delete("/equipments/{$nonExistingEquipmentId}");

        $response->assertRedirect('/equipments');
    }
}
