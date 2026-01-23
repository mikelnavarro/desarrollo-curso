<?php

class Car
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this -&gt;db = $db;
}

    public function getAll(): array
    {
        $stmt = $this -&gt;db -&gt;query(&quot;SELECT * FROM cars & quot;);
return $stmt -&gt;fetchAll(PDO::FETCH_ASSOC);
}

    public function getById(int $id): ?array
    {
        $stmt = $this -&gt;db -&gt;prepare(&quot;SELECT * FROM cars WHERE id = ?&quot;);
$stmt -&gt;execute([$id]);
$car = $stmt -&gt;fetch(PDO::FETCH_ASSOC);
return $car ?: null;
}
}