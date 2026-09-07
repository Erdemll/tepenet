<?php

namespace Database\Seeders;

use App\Models\IsIlani;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IsIlaniSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->jobs() as $job) {
            IsIlani::query()->updateOrCreate(
                ['slug' => $job['slug']],
                $job,
            );
        }
    }

    /**
     * @return list<array{
     *     slug: string,
     *     title: string,
     *     summary: string,
     *     type: string,
     *     cities: list<string>,
     *     employment_type: string,
     *     application_deadline: string,
     *     is_active: bool
     * }>
     */
    private function jobs(): array
    {
        return [
            $this->securityOfficerJob('marmara-avrupa-guvenlik-gorevlisi', 'Marmara Avrupa', ['İstanbul']),
            $this->securityOfficerJob('akdeniz-guvenlik-gorevlisi', 'Akdeniz', ['Antalya', 'Burdur', 'Isparta']),
            $this->securityOfficerJob('cukurova-guvenlik-gorevlisi', 'Çukurova', ['Adana', 'Adıyaman', 'Diyarbakır', 'Elazığ', 'Gaziantep', 'Hakkari', 'Hatay', 'Mersin', 'Malatya', 'Kahramanmaraş', 'Mardin', 'Siirt', 'Şanlıurfa', 'Batman', 'Şırnak', 'Kilis', 'Osmaniye']),
            $this->securityOfficerJob('dogu-marmara-guvenlik-gorevlisi', 'Doğu Marmara', ['Bolu', 'Kocaeli', 'Sakarya', 'Zonguldak', 'Bartın', 'Karabük', 'Düzce']),
            $this->securityOfficerJob('ege-guvenlik-gorevlisi', 'Ege', ['Aydın', 'İzmir', 'Manisa', 'Uşak']),
            $this->securityOfficerJob('guney-ege-guvenlik-gorevlisi', 'Güney Ege', ['Denizli', 'Muğla']),
            $this->securityOfficerJob('guney-marmara-guvenlik-gorevlisi', 'Güney Marmara', ['Afyonkarahisar', 'Balıkesir', 'Bilecik', 'Bursa', 'Eskişehir', 'Kütahya', 'Yalova']),
            $this->securityOfficerJob('ic-anadolu-guvenlik-gorevlisi', 'İç Anadolu', ['Ankara', 'Bitlis', 'Çankırı', 'Kayseri', 'Kırşehir', 'Konya', 'Nevşehir', 'Niğde', 'Van', 'Aksaray', 'Karaman', 'Kırıkkale']),
            $this->securityOfficerJob('karadeniz-guvenlik-gorevlisi', 'Karadeniz', ['Ağrı', 'Amasya', 'Artvin', 'Bingöl', 'Çorum', 'Erzincan', 'Erzurum', 'Giresun', 'Gümüşhane', 'Kars', 'Kastamonu', 'Muş', 'Ordu', 'Rize', 'Samsun', 'Sinop', 'Sivas', 'Tokat', 'Trabzon', 'Tunceli', 'Yozgat', 'Bayburt', 'Ardahan', 'Iğdır']),
            $this->securityOfficerJob('marmara-anadolu-guvenlik-gorevlisi', 'Marmara Anadolu', ['İstanbul']),
            $this->securityOfficerJob('trakya-guvenlik-gorevlisi', 'Trakya', ['Çanakkale', 'Edirne', 'Kırklareli', 'Tekirdağ']),
            [
                'slug' => 'guvenlik-yoneticisi-genel-basvuru',
                'title' => 'Güvenlik Yöneticisi Genel Başvuru',
                'summary' => 'Özel güvenlik yöneticisi genel başvurusu',
                'type' => IsIlani::TYPE_SECURITY_MANAGER,
                'cities' => ['Ankara', 'Antalya', 'Bursa', 'Çanakkale', 'Denizli', 'Eskişehir', 'Mersin', 'İstanbul', 'İzmir', 'Kocaeli', 'Konya', 'Muğla', 'Samsun', 'Tekirdağ', 'Trabzon', 'Yalova'],
                'employment_type' => 'Tam zamanlı',
                'application_deadline' => '2026-10-31',
                'is_active' => true,
            ],
        ];
    }

    /**
     * @param  list<string>  $cities
     * @return array{
     *     slug: string,
     *     title: string,
     *     summary: string,
     *     type: string,
     *     cities: list<string>,
     *     employment_type: string,
     *     application_deadline: string,
     *     is_active: bool
     * }
     */
    private function securityOfficerJob(string $slug, string $region, array $cities): array
    {
        return [
            'slug' => $slug,
            'title' => "Özel Güvenlik Görevlisi - {$region} Bölge Müdürlüğü",
            'summary' => "{$region} Bölgesi özel güvenlik görevlisi genel başvurusu",
            'type' => IsIlani::TYPE_SECURITY_OFFICER,
            'cities' => $cities,
            'employment_type' => 'Tam zamanlı',
            'application_deadline' => '2026-10-31',
            'is_active' => true,
        ];
    }
}
