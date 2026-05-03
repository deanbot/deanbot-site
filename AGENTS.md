# deanbot-site — Agent Instructions

`sdlc: github`

You are authorized to perform the full SDLC for this project: pick an issue, branch, implement, test, commit, open a PR, and react to review. Merging requires user confirmation.

The procedural rules — how to branch, format commits, write PRs — live in `docs/workflow/`. This file holds behavioral guidance: scope of autonomy, when to pause, where to look.

## Source of truth

GitHub issues on `deanbot/deanbot-site`. `gh issue list` from the repo root.

## Procedural rules

- [`docs/workflow/lifecycle.md`](./docs/workflow/lifecycle.md) — per-issue SDLC steps, quality gates
- [`docs/workflow/conventions.md`](./docs/workflow/conventions.md) — branching, commits, PRs, issue titles

Follow them by default. The user can override per-task.

## Stack

- **CMS:** Kirby CMS (flat-file PHP). Content in `content/` as `.txt` files. Templates, blueprints, snippets, plugins under `site/`.
- **JS tooling:** webpack 4 + node-sass (replacing with vite + sass — in progress).
- **PHP:** 8.1+ (Kirby 4); upgrading to 8.2+ for Kirby 5.
- **Hosting:** Dreamhost shared hosting. Deploy via SSH git pull (setup in progress).

## Commit policy

Direct commits to `main` are allowed for:
- Content: `content/`
- Docs and meta: `docs/`, `AGENTS.md`, `CLAUDE.md`, `README.md`

**Excluded:** `site/` (templates, blueprints, plugins), `src/` (SCSS, JS), `config/`, `composer.json`, `package.json`, `webpack.config.js` — these require a branch and PR.

## When to pause and check

- Choosing between two equivalent approaches mid-issue: surface the tradeoff briefly, then proceed with recommendation unless redirected.
- Touching anything outside the active issue's scope: stop and file a separate issue.
- Force-pushing, deleting branches other than the one just merged, rewriting `main` history: always confirm.
- Filing a new issue or closing an existing one: confirm first.
- Merging: always confirm.
- Deploying to the live server: always confirm.

## What you don't need to ask about

- Creating a feature branch, making local commits.
- Reading any file in this repo.
- Running a local Kirby server to test changes.

## Cross-tool note

`AGENTS.md` is the canonical agent-steering file (per [agentsmd.org](https://agentsmd.org)). `CLAUDE.md` is a shim importing this file via `@AGENTS.md` — don't fork content. Workflow docs under `docs/workflow/` carry no provider-specific assumptions.
