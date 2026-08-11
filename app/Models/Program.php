<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'title',
        'description',
        'excerpt',
        'icon',
        'sort_order',
        'slug',
        'image',
        'status',
    ];

    public function campains()
    {
        return $this->hasMany(Campain::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeOrdered($query)
    {
        if (Schema::hasColumn($this->getTable(), 'sort_order')) {
            return $query->orderBy('sort_order')->orderBy('id');
        }

        return $query->orderBy('id');
    }

    public function summary(int $limit = 150): string
    {
        $text = $this->excerpt ?: strip_tags((string) $this->description);

        return Str::limit(trim(preg_replace('/\s+/', ' ', $text)), $limit);
    }

    public function iconClass(): string
    {
        if (!empty($this->icon)) {
            return $this->icon;
        }

        foreach (self::catalog() as $slug => $item) {
            if ($this->slug === $slug) {
                return $item['icon'];
            }

            foreach ($item['keywords'] as $keyword) {
                if (Str::contains(Str::lower($this->title.' '.$this->slug), Str::lower($keyword))) {
                    return $item['icon'];
                }
            }
        }

        return 'flaticon-heart';
    }

    public function imageUrl(): string
    {
        if ($this->image) {
            return asset('storage/images/programs/'.$this->image);
        }

        return asset('assets/img/logo-alive-passion.png');
    }

    public static function catalog(): array
    {
        return [
            'elderly-sheltering-elder-care' => [
                'title' => 'Elderly Sheltering & Elder Care',
                'icon' => 'flaticon-home',
                'keywords' => ['elderly', 'elder', 'shelter'],
                'excerpt' => 'We honor the elderly by providing shelter, food, and consistent emotional and spiritual care — a place of rest and dignity for those who have spent their lives serving others.',
                'description' => <<<'HTML'
<p>Too often, the elderly in rural Rwanda are left alone, neglected, or without proper shelter and care, especially those who have no family or support system. Alive Passion honors the elderly by providing shelter, food, and consistent emotional and spiritual care.</p>
<p>We’ve built a place of rest and dignity for elders who have spent their lives serving others. By serving the elderly, we honor the past and set an example for future generations about what it means to love without conditions.</p>
<p>Our sheltering program is a testimony that no one is ever too old to be loved, respected, and cared for.</p>
HTML,
            ],
            'vocational-training-and-equipping' => [
                'title' => 'Vocational Training & Equipping',
                'icon' => 'flaticon-settings',
                'keywords' => ['vocational', 'sewing', 'equipping'],
                'excerpt' => 'Skill training, sewing, and pig farming give young women and single mothers in Bugesera the tools to earn an income, provide for their families, and become agents of change.',
                'description' => <<<'HTML'
<p>With high unemployment and limited vocational skills, many young women and single mothers are left without means to provide for themselves or their children. Alive Passion Ministries’ vocational programs offer skill training, resources, and income-producing opportunities to young women and single mothers identified in coordination with local government officials.</p>
<p>Women are trained in sewing and tailoring, then supported with sewing machines and startup guidance so they can launch micro-businesses or work as employees for other businesses. Raising pigs for food, breeding, and resale is another opportunity offered to women in rural Bugesera. An added benefit already being developed by participants is using manure from the pigs to provide needed nutrients for infertile, underutilized land to grow crops.</p>
<p>These initiatives empower women economically and socially, giving them the tools to regain their independence, provide for their families, and become agents of change in their communities. Economic empowerment is at the heart of long-term transformation, and this program helps us make that a reality for many.</p>
HTML,
            ],
            'evangelism-and-discipleship' => [
                'title' => 'Evangelism & Discipleship',
                'icon' => 'flaticon-pray',
                'keywords' => ['evangelism', 'discipleship', 'gospel'],
                'excerpt' => 'Through community outreach, church events, and home-based discipleship groups, we share the Gospel and walk with people in their faith journey across Bugesera.',
                'description' => <<<'HTML'
<p>At the heart of Alive Passion Ministries’ mission is the Gospel — sharing it as we are led and empowered by the Holy Spirit. We believe that spiritual poverty is even more devastating than material poverty.</p>
<p>Whether through one-on-one relationships or community outreach events, our evangelism efforts introduce community members to the transforming Gospel message of salvation, healing, and restoration. For both new believers and anyone wanting to grow in their relationship with God, we offer and encourage participation in small home-based discipleship groups widely available throughout the Bugesera district and coordinated through a network of participating churches.</p>
<p>Critical to these efforts is the availability and provision of Bibles through both Alive Passion Ministries and other participating churches. Evangelism is not just about preaching — it’s about building relationships and walking alongside people in their faith journey. Every act of compassion opens a door for the Gospel, and we are committed to seeing lives transformed by the love and truth of Christ.</p>
HTML,
            ],
            'small-group-leadership-training' => [
                'title' => 'Small Group Leadership Training',
                'icon' => 'flaticon-people',
                'keywords' => ['leadership', 'small group', 'leader'],
                'excerpt' => 'We train local small group leaders in biblical discipleship, workshops, and mentoring so spiritual transformation multiplies across communities and churches.',
                'description' => <<<'HTML'
<p>Sustained spiritual transformation requires strong, biblically grounded, and ethically committed leaders. Alive Passion Ministries invests in training local small group leaders — both in the church and the community — in biblical discipleship through leadership workshops and mentoring.</p>
<p>These leaders are then empowered to disciple others, multiplying the impact of spiritual transformation across communities and churches. We believe leadership is not a title but a calling to serve others faithfully, and through this program we’re shaping a generation of leaders who serve with humility, purpose, and faith.</p>
HTML,
            ],
            'child-sponsorship' => [
                'title' => 'Child Sponsorship',
                'icon' => 'flaticon-love',
                'keywords' => ['sponsorship', 'sponsor'],
                'excerpt' => 'Compassionate sponsors help children in Bugesera receive school fees, basic necessities, and mentorship so every child has the chance to thrive.',
                'description' => <<<'HTML'
<p>In Bugesera, many children grow up in extreme poverty, with limited access to education, health care, and proper nutrition. This reality robs them of their potential and traps families in cycles of hopelessness.</p>
<p>Through our Child Sponsorship program, Alive Passion connects compassionate sponsors with children in need, ensuring that these young lives receive school fees, basic necessities, and regular mentorship. By intervening early in a child’s life, we create space for dreams to grow and futures to be rewritten.</p>
<p>We believe every child deserves the chance to thrive, and this program is one of the most tangible expressions of our commitment to that belief.</p>
HTML,
            ],
            'child-development' => [
                'title' => 'Child Development',
                'icon' => 'flaticon-heart',
                'keywords' => ['child development', 'development'],
                'excerpt' => 'We identify children in crisis, stabilize their families, and walk with them long-term so they can access education, health care, nutrition, and their full potential.',
                'description' => <<<'HTML'
<p>For a variety of reasons not of their making, many children in Bugesera grow up in extreme poverty with limited access to education, health care, and proper nutrition.</p>
<p>Alive Passion’s Child Development program begins by identifying children in crisis situations, then working with the child’s family — often a single parent or parentless family — to provide immediate, short-term support. The goal is to stabilize the situation and put in place the basic education, health care, and nutrition resources a child needs.</p>
<p>Working with the child’s family and community partners, the program then continues an appropriate level of support to ensure sustained growth so the child can attain their full potential. Every child deserves the chance to thrive, and this program is one of the most tangible expressions of our commitment to that belief.</p>
HTML,
            ],
            'malnutrition-support' => [
                'title' => 'Malnutrition Support',
                'icon' => 'flaticon-healthy-food',
                'keywords' => ['malnutrition', 'nutrition', 'food'],
                'excerpt' => 'Targeted food support, nutritional education, and follow-up restore health and hope for the most vulnerable — especially children and nursing mothers.',
                'description' => <<<'HTML'
<p>Malnutrition is not just a food problem — it’s a dignity problem. Many families in Bugesera cannot afford balanced meals, leading to stunted growth, poor academic performance, and long-term health issues in children.</p>
<p>Alive Passion addresses this through targeted food support, nutritional education, and community follow-ups to ensure the most vulnerable, especially children and nursing mothers, receive life-sustaining nourishment.</p>
<p>Our work restores more than health; it restores hope and energy to families working hard to survive. We are passionate about fighting malnutrition because no one should suffer simply due to the lack of a daily meal.</p>
HTML,
            ],
        ];
    }
}
