<?php
return [
    'directory_list' => [
        './app'
    ],
    'backward_compatibility_checks' => true,
    'ignore_undeclared_functions_with_known_signatures' => false,
    'whitelist_issue_types' => [
        'PhanCompatiblePHP7',              // 変更された可能性のある構文チェック
        'PhanDeprecatedFunctionInternal',  // 7.0以降で非推奨になった関数
        'PhanUndeclaredFunction',          // PHP5.xで非推奨になり、PHP7.0で削除された関数
    ],
    'plugins' => ['InvokePHPNativeSyntaxCheckPlugin'],
];