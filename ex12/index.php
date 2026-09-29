<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 45px 20px;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e0f2fe, #f8fafc);
        }
        .library-container {
            width: 100%;
            max-width: 1050px;
            margin: auto;
        }
        .library-card {
            background: #ffffff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(30, 64, 175, 0.15);
        }
        .page-heading {
            text-align: center;
            margin-bottom: 30px;
        }
        .page-heading h1 {
            margin: 0 0 10px;
            color: #1e40af;
            font-size: 32px;
        }
        .page-heading p {
            margin: 0;
            color: #64748b;
            font-size: 15px;
        }
        .book-list {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
            overflow: hidden;
        }
        .book-list th {
            background: #2563eb;
            color: #ffffff;
            padding: 15px;
            text-align: left;
            font-size: 15px;
        }
        .book-list td {
            padding: 14px 15px;
            color: #1e3a8a;
            border-bottom: 1px solid #dbeafe;
        }
        .book-list tbody tr:nth-child(even) {
            background: #eff6ff;
        }
        .book-list tbody tr:hover {
            background: #dbeafe;
        }
        .book-price {
            color: #1d4ed8;
            font-weight: bold;
        }
        .error-message {
            padding: 20px;
            text-align: center;
            color: #dc2626;
            background: #fef2f2;
            border-radius: 8px;
        }
        .page-footer {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid #dbeafe;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }
        @media (max-width: 700px) {
            .library-card {
                padding: 20px;
            }
            .page-heading h1 {
                font-size: 25px;
            }
            .book-list th,
            .book-list td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <main class="library-container">
        <section class="library-card">
            <header class="page-heading">
                <h1>Digital Library</h1>
                <p>Book information retrieved from XML using PHP</p>
            </header>

            <?php
            $xmlFile = "books.xml";

            if (!file_exists($xmlFile)) {
                echo "<div class='error-message'>The books.xml file is missing.</div>";
            } else {
                $libraryData = simplexml_load_file($xmlFile);

                if ($libraryData === false) {
                    echo "<div class='error-message'>Unable to read the XML data.</div>";
                } else {
                    echo "<table class='book-list'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Book Title</th>";
                    echo "<th>Author</th>";
                    echo "<th>Publication Year</th>";
                    echo "<th>Price</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    foreach ($libraryData->book as $record) {
                        $title = htmlspecialchars((string)$record->title);
                        $author = htmlspecialchars((string)$record->author);
                        $year = htmlspecialchars((string)$record->year);
                        $amount = htmlspecialchars((string)$record->price);

                        echo "<tr>";
                        echo "<td>{$title}</td>";
                        echo "<td>{$author}</td>";
                        echo "<td>{$year}</td>";
                        echo "<td class='book-price'>\${$amount}</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                }
            }
            ?>

            <footer class="page-footer">
                PHP + XML Library Experiment
            </footer>
        </section>
    </main>
</body>
</html>