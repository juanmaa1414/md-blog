<?php

use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// First, an nice example.
		factory(App\Note::class)->create([
			'title' => 'Journalism in the Age of Open Data',
			'slug' => 'journalism-in-the-age-of-open-data',
			'user_id' => 1,
			'published' => true,
			'upvotes' => 2,
			'content' => <<<EOD
# Reviewing how journalism Interacts with Open Data
### The Washington Post

The Washington Post has published an [analysis](http://www.washingtonpost.com/sf/investigative/2015/04/11/thousands-dead-few-prosecuted/), based on a wide range of public records, as well as interviews, and sought to identify for the first time every officer who has faced charges for fatal shootings in the US since 2005.

The Washington Post staff was recently recognized as [The 2016 Pulitzer Prize Winner in National Reporting](http://www.pulitzer.org/winners/washington-post-staff) “for its revelatory initiative in creating and using a national database to illustrate how often and why the police shoot to kill and who the victims are most likely to be.”

### The Guardian

The Guardian’s [datablog](http://www.theguardian.com/data) turns the sometimes-boring data into graphics, interactive maps or interesting comparisons. For example, amidst the debate on the future of the UK steel industry, the newspaper website ran in early April the story [“](http://www.theguardian.com/news/datablog/2016/apr/01/tata-steel-crisis-what-else-could-we-buy)[What the UK could buy for £1.5bn (instead of spending it on Tata Steel)”](http://www.theguardian.com/news/datablog/2016/apr/01/tata-steel-crisis-what-else-could-we-buy).

The Guardian looked at how much the UK government has spent in other areas, and compared the costs. Some of the comparisons revealed that the £1.5 billion was enough for half a big new aircraft carrier or 50% of the annual BBC bill.
### Independant Newsrooms

Three-time Pulitzer Prize winner [ProPublica](https://www.propublica.org/), or as its slogan says ‘Journalism in the Public Interest’, has used open data sources in many of its investigations.

[MapLight](http://maplight.org/) uses open data and makes available for free use data to reveal money influence on politics. The website contains datasets on campaign contributions to each member of the US Congress; how each member of the Congress voted on every bill; and which interest groups and companies support and oppose key bills.

In the UK, [OpenPrescribing](https://openprescribing.net/) allows GPs, managers and everyone to explore prescribing data in the country. Every month, the NHS publishes anonymized data about the drugs prescribed by GPs. OpenPrescribing makes the raw data files more user-friendly.

![Journalism in the Age of Open Data](https://ontotext.com/wp-content/uploads/2016/05/xblog_journalism-in-the-age-of-open-data-02.png.pagespeed.ic.vUUVB3Www6.png)

## How Open is Open Data?

It is often the case that governments open sets of data that are sketchy and/or unwieldy. Sometimes databases are updated once a year, at best. At other times, datasets are of questionable relevance and importance to the general public. There are also times when governments are not willing to open certain data, which by itself also tells a story.

[Jonathan Stoneman](https://reutersinstitute.politics.ox.ac.uk/people/jonathan-stoneman-visiting-fellow), a former BBC journalist and now a visiting fellow at the Reuters Institute for the Study of Journalism, [said](https://www.youtube.com/watch?v=md-TzHAkAGw) last year that the open data community should talk to journalists and journalists should understand what open data is and what it can do for them. He added:

> They need to publicize each other; it’s a two-way street and is not happening.

In his working paper _[Does Open Data Need Journalism?](https://reutersinstitute.politics.ox.ac.uk/sites/default/files/Stoneman%20-%20Does%20Open%20Data%20need%20Journalism.pdf)_, Stoneman writes:

> Journalists will not feel the need to make greater use of Open Data until they see it as a rich seam of material, while data policy-makers won’t feel the need to improve the stream of data until they come under pressure to do so.

The publishing and use of open data – especially outside the US, the UK and the Scandinavian countries – is still something new. And journalists working with open data are not the mainstream.

In its pursuit of truth, transparency and government accountability, journalism can benefit from the opening of more and more data. Governments and authorities, on the other hand, can start relying on journalism to promote the use of open data and its social and economic value.

Want to tell your stories from the perspective of open data?
EOD
		]);
		
		// After, continue with the rest.
		factory(App\Note::class, 15)->create();
    }
}
