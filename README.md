# タスク管理アプリ (ToDo Management App)

このアプリは **ユーザーごとにタスクを登録・管理できる ToDo アプリケーション** です。  
ログイン機能を備えており、ユーザーごとにタスクボードが表示され、タスクを登録・削除することができます。

---

## 概要
- ユーザー登録・ログイン機能  
- タスクの登録・削除・一覧表示  
- 各ユーザーが自分のタスクのみを管理可能  

---

## 画面イメージ（ScreenShot）

<p align="center">
  <img src="./src/images/login.png" alt="ログイン画面" width="400"><br>
  <sub>ログイン画面</sub>
</p>

<p align="center">
  <img src="./src/images/taskboard1.png" alt="タスクボード画面（1枚目）" width="400"><br>
  <sub>タスクボード画面（1枚目）</sub>
</p>

<p align="center">
  <img src="./src/images/taskboard2.png" alt="タスクボード画面（2枚目）" width="400"><br>
  <sub>タスクボード画面（2枚目）</sub>
</p>

<p align="center">
  <img src="./src/images/register.png" alt="ユーザー登録画面" width="400"><br>
  <sub>ユーザー登録画面</sub>
</p>

## データベース構成

###  User テーブル
- id: 主キー (自動採番) 
- username: ユーザー名（ユニーク）
- password: パスワード（ハッシュ化） 
- registered_at: 登録日時 
- remember_token: ログイン保持トークン 
- created_at / updated_at: タイムスタンプ

###  Task テーブル
- id: タスクを一意に識別するID
- user_id: 所有ユーザーのID | 外部キー（users.id） 
- title: タスク名
- registered_at: タスクの登録日時
- due_date: タスクの締切日時
- memo: タスクの詳細・補足メモ
- created_at / updated_at: タイムスタンプ

## 今後のアップデート予定
- **タグ機能の追加**：タスクごとにタグを付与し、分類・検索できるようにする  
- **カウントダウン機能**：締め切り日までの残り時間を表示  

---

## 使用技術
- **バックエンド**：Laravel (PHP)  
- **フロントエンド**：HTML / CSS / JavaScript  
- **データベース**：MySQL  
- **環境**： Docker

---

## 今後の方針
今後はタグ機能とカウントダウン機能の実装を進めながら、  
UIの改善やユーザー体験の向上も図っていきます。

---