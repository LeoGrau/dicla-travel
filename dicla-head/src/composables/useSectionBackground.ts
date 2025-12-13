export function useSectionBackground({
  onSectionBackgroundChange,
}: {
  onSectionBackgroundChange: any
}) {
  // Watcher
  let observer: IntersectionObserver | null = null

  // Maps
  const sectionMap = new Map<HTMLElement, number>() // Visible sections

  function getColor(item: HTMLElement) {
    const regex = /bg-([a-zA-Z]+)-[0-9]{1,3}/g
    const allMatches = [...item.classList.toString().matchAll(regex)]
    if (allMatches.length === 0) return null
    const color = allMatches[0]![1]
    const backgroundColor = allMatches[0]![0]
    console.log('Yeah color', item.classList.toString(), allMatches)
    return { color, backgroundColor }
  }

  function minSectionDistance(sectionMap: Map<HTMLElement, number>) {
    let minDistance: number = Infinity
    let topSection: HTMLElement | null = null
    // console.log('-----Yeah!------')
    sectionMap.forEach((distance, key) => {
      // console.log('Yeah!', key, distance, key.getBoundingClientRect().top)
      if (distance < minDistance) {
        minDistance = distance
        topSection = key as HTMLElement
      }
    })

    const { color, backgroundColor } = getColor(topSection!)!

    console.log('Yeah!', minDistance, topSection!.classList, topSection!.classList.toString())
    onSectionBackgroundChange({ color, backgroundColor })
  }

  function observeItemsFromWrapper(wrapper: HTMLElement) {
    const sections = wrapper.querySelectorAll('section')

    observer = new IntersectionObserver(
      (entries) => {
        // Check every entry if something happened
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            sectionMap.set(entry.target as HTMLElement, entry.boundingClientRect.top) // Set new
          } else {
            sectionMap.delete(entry.target as HTMLElement)
          }
        })

        // Get section with smaller distance and emite
        minSectionDistance(sectionMap)
      },
      { threshold: 0.1 },
    )

    if (observer) {
      sections.forEach((section) => observer!.observe(section))
    } else {
      throw Error('Observer object has not be instantiated')
    }
  }

  return {
    observeItemsFromWrapper,
  }
}
