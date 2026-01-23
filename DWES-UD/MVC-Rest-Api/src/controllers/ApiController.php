<?php

namespace controllers;

&lt;?php
class ApiController
{
    private PDO $db;
    private Car $carModel;

    public function __construct()
    {
        $this -&gt;db = new PDO(
        &quot;mysql:host = localhost;dbname = api_coches;charset = utf8mb4 & quot;,
&quot;root & quot;,
&quot;&quot;,
[PDO::ATTR_ERRMODE =& gt; PDO::ERRMODE_EXCEPTION]
);

$this -&gt;carModel = new Car($this -&gt;db);
}
}