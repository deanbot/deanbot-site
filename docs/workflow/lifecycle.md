# Lifecycle — Per-Issue SDLC

How a single issue moves from open to merged. Provider-agnostic.

## Steps

1. **Pick an issue.** Open issue on `deanbot/deanbot-site`. `gh issue list` from the repo root.
2. **Branch off `main`.** Naming: `<issue-number>-<kebab-slug>` — e.g. `12-kirby-5-upgrade`.
3. **Implement.** Stay inside the issue's scope. Found related work? File a separate issue.
4. **Quality gates.** Must pass locally before opening a PR:
   - Start a local Kirby server (`composer start`) and verify the touched feature works end-to-end.
   - If `src/` changed: run `npm run build` and confirm no build errors.
   - If PHP changed: check for errors in the browser and Kirby error log.
   - No automated test suite yet — manual smoke is the gate.
5. **Commit.** Reference the issue. Format: see [`conventions.md`](./conventions.md#commits).
6. **Open a PR.** `gh pr create`. Fill `## Summary` (1–3 bullets) and `## Test plan` (what you verified manually). Title mirrors the issue title. End body with `Closes #N`.
7. **Self-review.** Read the diff before merging. If anything looks off, fix it on the branch.
8. **Merge.** Squash-merge into `main`; delete the branch.

## Out-of-scope work

The most common source of drift is bundling related cleanup into an issue branch. Don't. File a fresh issue, finish the current one.

## See also

- [Conventions](./conventions.md) — branching, commits, PRs, issue titles.
- Repo `AGENTS.md` — autonomous execution scope and when to pause.
