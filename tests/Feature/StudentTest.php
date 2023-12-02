<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_route(): void
    {
        $response = $this->get('/students');

        $response->assertStatus(200);
        $response->assertViewIs('students.index');
    }

    public function test_non_existent_route(): void
    {
        $response = $this->get('/studentszefezf');

        $response->assertStatus(404);
    }

    public function test_show_route(): void
    {
        $student = Student::factory()->create();

        $response = $this->get("/students/{$student->id}");

        $response->assertStatus(200);
        $response->assertViewIs('students.show');
    }

    public function test_show_non_existent_route(): void
    {
        $response = $this->get('/students/999');

        $response->assertStatus(404);
    }

    public function test_create_route(): void
    {
        $response = $this->get('/students/create');

        $response->assertStatus(200);
        $response->assertViewIs('students.create');
    }

    public function test_edit_route(): void
    {
        $student = Student::factory()->create();

        $response = $this->get("students/{$student->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('students.edit');
    }

    public function test_edit_non_existent_route(): void
    {
        $response = $this->get('/students/999/edit');

        $response->assertStatus(404);
    }

    public function test_store_route(): void
    {
        $studentData = [
            'lastname' => 'Kujo',
            'firstname' => 'Jotaro',
            'mail' => 'jotaro@kujo.fr',
        ];

        $response = $this->post('/students', $studentData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('students', $studentData);
    }

    public function test_store_invalid_data_route(): void
    {
        $invalidStudentData = [
            'lastname' => '',
            'firstname' => 'Jotaro',
            'mail' => 'jotaro.fr',

        ];

        $response = $this->post('/students', $invalidStudentData);

        $response->assertSessionHasErrors(['lastname', 'mail']);
    }

    public function test_update_route(): void
    {
        $student = Student::factory()->create();
        $updatedStudentData = [
            'lastname' => 'NewLastName',
            'firstname' => 'NewFirstName',
            'mail' => 'newemail@example.com',
        ];

        $response = $this->put("/students/{$student->id}", $updatedStudentData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('students', $updatedStudentData);
    }

    public function test_update_invalid_data_route(): void
    {
        $student = Student::factory()->create();
        $invalidUpdatedStudentData = [
            'lastname' => '',
            'firstname' => 'NewFirstName',
            'mail' => 'newemailexample.com',
        ];

        $response = $this->put("/students/{$student->id}", $invalidUpdatedStudentData);

        $response->assertSessionHasErrors(['lastname', 'mail']);
    }

    public function test_update_non_existing_student_route(): void
    {
        $nonExistingStudentId = 999;
        $updatedStudentData = [
            'lastname' => 'NewLastName',
            'firstname' => 'NewFirstName',
            'mail' => 'adozakd@test.com',
        ];

        $response = $this->put("/students/{$nonExistingStudentId}", $updatedStudentData);

        $response->assertStatus(404);
    }

    public function test_delete_route(): void
    {
        $student = Student::factory()->create();

        $response = $this->delete("/students/{$student->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }

    public function test_delete_non_existing_student_route(): void
    {
        $nonExistingStudentId = 999;

        $response = $this->delete("/students/{$nonExistingStudentId}");

        $response->assertStatus(404);
    }
}
