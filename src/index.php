<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои решения задач</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .problem-difficulty-easy { color: #28a745; }
        .problem-difficulty-medium { color: #ffc107; }
        .problem-difficulty-hard { color: #dc3545; }
        .code-block {
            background-color: #1e1e1e;
            color: #d4d4d4;
            border-radius: 5px;
            padding: 15px;
            font-family: 'Fira Code', monospace;
            font-size: 14px;
            line-height: 1.5;
            overflow-x: auto;
            white-space: pre-wrap;
            tab-size: 4;
            -moz-tab-size: 4;
        }
        .solution-content {
            display: none;
        }
        .active-solution {
            display: block;
        }
        .nav-tabs .nav-link.active {
            font-weight: bold;
            background-color: #f8f9fa;
            border-bottom: none;
        }
        .problem-info-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .info-badge {
            font-size: 0.85rem;
            padding: 6px 10px;
            border-radius: 20px;
        }
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }
        .modal-header {
            background-color: #f0f4f8;
            padding: 15px 20px;
        }
        .modal-body {
            padding: 20px;
        }
        .solution-tabs {
            margin-top: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .description-text {
            line-height: 1.6;
            color: #333;
        }
        .code-keyword {
            color: #569cd6;
        }
        .code-function {
            color: #dcdcaa;
        }
        .code-string {
            color: #ce9178;
        }
        .code-comment {
            color: #6a9955;
        }
        .code-number {
            color: #b5cea8;
        }
        .hljs {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 15px;
            border-radius: 5px;
        }
        .copy-btn {
            position: absolute;
            right: 10px;
            top: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .copy-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .code-container {
            position: relative;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="bi bi-code-square me-2"></i>Мои решения задач
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-house-door me-1"></i> Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-plus-circle me-1"></i> Добавить решение</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-gear me-1"></i> Настройки</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Фильтры и поиск</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-select" id="platformFilter">
                                <option value="">Все платформы</option>
                                <option value="codewars">Codewars</option>
                                <option value="leetcode">LeetCode</option>
                                <option value="hackerrank">HackerRank</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="difficultyFilter">
                                <option value="">Любая сложность</option>
                                <option value="easy">Легкая</option>
                                <option value="medium">Средняя</option>
                                <option value="hard">Сложная</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Поиск по названию или описанию...">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Мои решения</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Платформа</th>
                                <th>Сложность</th>
                                <th>Дата решения</th>
                                <th>Язык</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Пример данных - в реальном приложении эти данные будут извлекаться из базы данных
                            $problems = [
                                [
                                    'id' => 1,
                                    'title' => 'Two Sum',
                                    'platform' => 'leetcode',
                                    'difficulty' => 'easy',
                                    'solved_date' => '2023-05-15',
                                    'language' => 'Python',
                                    'description' => 'Найти индексы двух чисел, которые в сумме дают заданное значение.',
                                    'solution' => 'def twoSum(nums, target):\n    hashmap = {}\n    for i, num in enumerate(nums):\n        complement = target - num\n        if complement in hashmap:\n            return [hashmap[complement], i]\n        hashmap[num] = i\n    return []',
                                    'explanation' => 'Используем хэш-таблицу для хранения просмотренных чисел и их индексов. Для каждого числа вычисляем complement (target - num). Если complement уже есть в хэш-таблице, возвращаем индексы.'
                                ],
                                [
                                    'id' => 2,
                                    'title' => 'Reverse String',
                                    'platform' => 'leetcode',
                                    'difficulty' => 'easy',
                                    'solved_date' => '2023-05-18',
                                    'language' => 'JavaScript',
                                    'description' => 'Перевернуть строку (массив символов) на месте.',
                                    'solution' => 'function reverseString(s) {\n    let left = 0, right = s.length - 1;\n    while (left < right) {\n        [s[left], s[right]] = [s[right], s[left]];\n        left++;\n        right--;\n    }\n};',
                                    'explanation' => 'Используем два указателя: один с начала массива, другой с конца. Меняем местами элементы и двигаем указатели к центру, пока они не встретятся.'
                                ],
                                [
                                    'id' => 3,
                                    'title' => 'Valid Parentheses',
                                    'platform' => 'codewars',
                                    'difficulty' => 'medium',
                                    'solved_date' => '2023-05-20',
                                    'language' => 'Python',
                                    'description' => 'Проверить, правильно ли расставлены скобки в строке.',
                                    'solution' => 'def isValid(s):\n    stack = []\n    mapping = {")": "(", "}": "{", "]": "["}\n    for char in s:\n        if char in mapping:\n            top_element = stack.pop() if stack else \'#\'\n            if mapping[char] != top_element:\n                return False\n        else:\n            stack.append(char)\n    return not stack',
                                    'explanation' => 'Используем стек для отслеживания открывающих скобок. При встрече закрывающей скобки проверяем, соответствует ли она последней открывающей.'
                                ],
                                [
                                    'id' => 4,
                                    'title' => 'Binary Search',
                                    'platform' => 'leetcode',
                                    'difficulty' => 'easy',
                                    'solved_date' => '2023-05-22',
                                    'language' => 'Java',
                                    'description' => 'Реализовать бинарный поиск в отсортированном массиве.',
                                    'solution' => 'public int binarySearch(int[] nums, int target) {\n    int left = 0, right = nums.length - 1;\n    while (left <= right) {\n        int mid = left + (right - left) / 2;\n        if (nums[mid] == target) return mid;\n        if (nums[mid] < target) left = mid + 1;\n        else right = mid - 1;\n    }\n    return -1;\n}',
                                    'explanation' => 'Делим массив пополам на каждой итерации. Сравниваем средний элемент с целевым значением и продолжаем поиск в соответствующей половине.'
                                ],
                                [
                                    'id' => 5,
                                    'title' => 'Trapping Rain Water',
                                    'platform' => 'leetcode',
                                    'difficulty' => 'hard',
                                    'solved_date' => '2023-05-25',
                                    'language' => 'C++',
                                    'description' => 'Вычислить, сколько воды может быть захвачено между элементами массива, представляющими высоты.',
                                    'solution' => 'int trap(vector<int>& height) {\n    int left = 0, right = height.size() - 1;\n    int left_max = 0, right_max = 0;\n    int ans = 0;\n    while (left < right) {\n        if (height[left] < height[right]) {\n            height[left] >= left_max ? (left_max = height[left]) : ans += (left_max - height[left]);\n            left++;\n        } else {\n            height[right] >= right_max ? (right_max = height[right]) : ans += (right_max - height[right]);\n            right--;\n        }\n    }\n    return ans;\n}',
                                    'explanation' => 'Используем два указателя. На каждом шаге определяем, с какой стороны высота меньше, и обновляем соответствующий максимум. Вода, которая может быть захвачена на текущей позиции, равна разнице между текущим максимумом и текущей высотой.'
                                ]
                            ];

                            foreach ($problems as $problem) {
                                $difficulty_class = 'problem-difficulty-' . $problem['difficulty'];
                                echo "<tr data-problem-id='{$problem['id']}'>";
                                echo "<td>{$problem['id']}</td>";
                                echo "<td>{$problem['title']}</td>";
                                echo "<td>" . ucfirst($problem['platform']) . "</td>";
                                echo "<td><span class='{$difficulty_class}'>" .
                                    ucfirst($problem['difficulty']) . "</span></td>";
                                echo "<td>{$problem['solved_date']}</td>";
                                echo "<td>{$problem['language']}</td>";
                                echo "<td>
                                                <button class='btn btn-sm btn-outline-primary view-solution' data-bs-toggle='modal' data-bs-target='#solutionModal'>
                                                    <i class='bi bi-eye'></i> Просмотр
                                                </button>
                                              </td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для просмотра решения -->
<div class="modal fade" id="solutionModal" tabindex="-1" aria-labelledby="solutionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="solutionModalLabel">Решение задачи</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 id="problem-title"></h4>
                <div class="d-flex justify-content-between mt-3">
                    <span id="problem-platform" class="badge bg-secondary"></span>
                    <span id="problem-difficulty" class="badge"></span>
                    <span id="problem-language" class="badge bg-info"></span>
                    <span id="problem-date" class="badge bg-light text-dark"></span>
                </div>

                <div class="mt-3">
                    <h5>Описание</h5>
                    <p id="problem-description"></p>
                </div>

                <ul class="nav nav-tabs mt-4" id="solutionTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="code-tab" data-bs-toggle="tab" data-bs-target="#code" type="button" role="tab">Код</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="explanation-tab" data-bs-toggle="tab" data-bs-target="#explanation" type="button" role="tab">Объяснение</button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="solutionTabContent">
                    <div class="tab-pane fade show active" id="code" role="tabpanel">
                        <pre class="code-block"><code id="problem-solution" class="language-python"></code></pre>
                    </div>
                    <div class="tab-pane fade" id="explanation" role="tabpanel">
                        <p id="problem-explanation"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">Мои решения задач &copy; <?php echo date('Y'); ?></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Получаем все кнопки просмотра решений
        const viewButtons = document.querySelectorAll('.view-solution');

        // Добавляем обработчик событий для каждой кнопки
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Находим строку таблицы, содержащую эту кнопку
                const row = this.closest('tr');
                const problemId = row.getAttribute('data-problem-id');

                // В реальном приложении здесь будет AJAX-запрос к серверу
                // Для демонстрации используем статические данные

                // Находим задачу по ID (в реальном приложении это будет запрос к БД)
                const problems = <?php echo json_encode($problems); ?>;
                const problem = problems.find(p => p.id == problemId);

                if (problem) {
                    // Заполняем модальное окно данными о задаче
                    document.getElementById('problem-title').textContent = problem.title;
                    document.getElementById('problem-platform').textContent = problem.platform;
                    document.getElementById('problem-difficulty').textContent = problem.difficulty;
                    document.getElementById('problem-difficulty').className = 'badge ' +
                        (problem.difficulty === 'easy' ? 'bg-success' :
                            problem.difficulty === 'medium' ? 'bg-warning' : 'bg-danger');
                    document.getElementById('problem-language').textContent = problem.language;
                    document.getElementById('problem-date').textContent = 'Решена: ' + problem.solved_date;
                    document.getElementById('problem-description').textContent = problem.description;
                    document.getElementById('problem-solution').textContent = problem.solution;
                    document.getElementById('problem-explanation').textContent = problem.explanation;
                }
            });
        });

        // Фильтрация по платформе
        const platformFilter = document.getElementById('platformFilter');
        platformFilter.addEventListener('change', function() {
            filterProblems();
        });

        // Фильтрация по сложности
        const difficultyFilter = document.getElementById('difficultyFilter');
        difficultyFilter.addEventListener('change', function() {
            filterProblems();
        });

        function filterProblems() {
            const platformValue = platformFilter.value;
            const difficultyValue = difficultyFilter.value;

            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const platform = row.cells[2].textContent.toLowerCase();
                const difficulty = row.cells[3].textContent.toLowerCase();

                const platformMatch = !platformValue || platform === platformValue;
                const difficultyMatch = !difficultyValue || difficulty === difficultyValue;

                if (platformMatch && difficultyMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    });
</script>
</body>
</html>