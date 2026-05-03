# Conventions — Branching, Commits, PRs, Naming

All formatting and naming rules for deanbot-site. Provider-agnostic.

---

## Branching

Trunk-based. `main` is always deployable (once deploy is configured).

- **Branch off `main`.** Always.
- **Branch name format:** `<issue-number>-<kebab-slug>` — e.g. `12-kirby-5-upgrade`, `7-fix-sync-down-flag`.
- **Lifetime:** short. If a branch lives longer than a day or two, rebase onto `main`.
- **After merge:** branch is deleted. Squash-merge keeps `main` history clean.

## Commits

- **Reference the issue in every commit.** `Closes #N` for full resolution, `Refs #N` for partial.
- **Subject line:** imperative mood, ≤72 chars. No trailing period.
- **Body (optional):** explain *why* when the diff doesn't make it obvious.

Example:
```
Upgrade Kirby CMS from v4 to v5

PHP 8.2 required — verified Dreamhost server version before upgrading.
Replaced deprecated <k-inside> panel components with <k-panel-inside>.

Closes #12
```

## Pull requests

- **Title:** mirror the issue title verbatim.
- **Body:** `## Summary` (1–3 bullets) + `## Test plan` (what was verified manually).
- **Issue link required:** every PR ends with `Closes #N` or `Refs #N`.
- **Self-review:** read the diff before merging — this is a solo project.

## Issue titles

No milestone prefix needed for a personal project. Title should name the outcome, not the task:

- "Upgrade Kirby to v5" not "Do Kirby upgrade"
- "Fix sync-down timestamp preservation" not "Fix sync bug"
- "Replace webpack with vite + sass" not "Update JS tooling"
